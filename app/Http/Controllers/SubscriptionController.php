<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Package;
use App\Models\UserSubscription;
use App\Models\BulkRegistration;
use App\Models\BulkSubscriptionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    public function premium()
    {
        $user = Auth::user();

        // Get current subscription from new system
        $currentSubscription = $user->userSubscriptions()
            ->where('is_active', true)
            ->where('expires_at', '>', now())
            ->with('subscribable')
            ->first();

        return view('subscription.premium', compact('currentSubscription'));
    }

    public function subscribe(Request $request)
    {
        $user = Auth::user();

        // Check if user already has active subscription
        if ($user->hasActivePremiumSubscription()) {
            return redirect()->route('subscription.premium')
                ->with('info', 'Anda sudah memiliki langganan premium aktif.');
        }

        $request->validate([
            'package_id' => 'required|integer|exists:packages,id',
            'payment_method' => 'required|string',
        ]);

        // Get package details
        $package = Package::find($request->package_id);
        if (!$package) {
            return back()->with('error', 'Paket tidak ditemukan.');
        }

        // Create user subscription using new system
        $subscription = UserSubscription::create([
            'user_id' => $user->id,
            'subscribable_type' => 'App\Models\Package',
            'subscribable_id' => $package->id,
            'package_name' => $package->name,
            'package_category' => 'full_package',
            'original_price' => $package->current_price,
            'final_price' => $package->current_price,
            'starts_at' => now(),
            'expires_at' => now()->addYear(), // 1 year subscription
            'is_active' => true,
            'can_access_challenges' => $package->can_access_challenges,
            'payment_method' => $request->payment_method,
            'payment_status' => 'completed', // For demo, normally 'pending'
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Selamat! Langganan premium Anda sudah aktif selama 1 tahun.');
    }

    public function subscribeBulk(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'package_id' => 'required|integer|exists:packages,id',
            'people' => 'required|array|min:3', // Minimum 3 people for bulk
            'payment_method' => 'required|string',
        ]);

        // Get package details
        $package = Package::find($request->package_id);
        if (!$package) {
            return back()->with('error', 'Paket tidak ditemukan.');
        }

        $peopleData = $request->people;
        $totalPeople = count($peopleData) + 1; // +1 for the registrant

        // Calculate discount
        $discountPercentage = 0;
        if ($totalPeople >= 3) {
            $discountPercentage = min(7 + ($totalPeople * 1), 15);
        }

        $baseTotal = $totalPeople * $package->current_price;
        $discountAmount = $baseTotal * ($discountPercentage / 100);
        $finalTotal = $baseTotal - $discountAmount;

        DB::beginTransaction();
        try {
            // Create bulk registration
            $bulkRegistration = BulkRegistration::create([
                'registrant_id' => $user->id,
                'registrant_name' => $user->name,
                'registrant_email' => $user->email,
                'total_people' => $totalPeople,
                'applied_tier_id' => null, // We'll calculate this
                'package_category' => 'full_package',
                'package_details' => json_encode([
                    'package_id' => $package->id,
                    'package_name' => $package->name,
                    'can_access_challenges' => $package->can_access_challenges
                ]),
                'price_per_person' => $package->current_price,
                'base_total' => $baseTotal,
                'discount_percentage' => $discountPercentage,
                'discount_amount' => $discountAmount,
                'final_total' => $finalTotal,
                'final_price_per_person' => $finalTotal / $totalPeople,
                'status' => 'pending',
                'requested_at' => now(),
                'payment_method' => $request->payment_method,
                'registered_people_data' => json_encode($peopleData),
            ]);

            // Create subscription for registrant (self)
            UserSubscription::create([
                'user_id' => $user->id,
                'subscribable_type' => 'App\Models\Package',
                'subscribable_id' => $package->id,
                'package_name' => $package->name,
                'package_category' => 'full_package',
                'original_price' => $package->current_price,
                'final_price' => $finalTotal / $totalPeople,
                'starts_at' => now(),
                'expires_at' => now()->addYear(),
                'is_active' => true,
                'can_access_challenges' => $package->can_access_challenges,
                'payment_method' => $request->payment_method,
                'payment_status' => 'pending',
                'admin_notes' => "Bulk registration ID: {$bulkRegistration->id}",
            ]);

            // Process each person
            foreach ($peopleData as $personData) {
                // Check if user exists
                $existingUser = User::where('email', $personData['email'])->first();

                if ($existingUser) {
                    // Create subscription for existing user
                    UserSubscription::create([
                        'user_id' => $existingUser->id,
                        'subscribable_type' => 'App\Models\Package',
                        'subscribable_id' => $package->id,
                        'package_name' => $package->name,
                        'package_category' => 'full_package',
                        'original_price' => $package->current_price,
                        'final_price' => $finalTotal / $totalPeople,
                        'starts_at' => now(),
                        'expires_at' => now()->addYear(),
                        'is_active' => false, // Will be activated after payment
                        'can_access_challenges' => $package->can_access_challenges,
                        'payment_method' => 'bulk_registration',
                        'payment_status' => 'pending',
                        'admin_notes' => "Bulk registration ID: {$bulkRegistration->id} - Pending activation",
                    ]);
                } else {
                    // Create record for new user (will be activated when user registers)
                    BulkSubscriptionUser::create([
                        'bulk_registration_id' => $bulkRegistration->id,
                        'user_id' => null, // Will be filled when user registers
                        'user_name' => $personData['name'],
                        'user_email' => $personData['email'],
                        'user_phone' => $personData['phone'] ?? null,
                        'package_name' => $package->name,
                        'package_category' => 'full_package',
                        'original_price_per_person' => $package->current_price,
                        'final_price_per_person' => $finalTotal / $totalPeople,
                        'status' => 'pending_payment',
                        'can_access_challenges' => $package->can_access_challenges,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('dashboard')
                ->with('success', "Pendaftaran berhasil! Total pembayaran: " . number_format($finalTotal, 0, ',', '.') . ". Silakan lakukan pembayaran untuk mengaktifkan semua akun.");

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function history()
    {
        $user = Auth::user();
        $subscriptions = $user->subscriptions()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('subscription.history', compact('subscriptions'));
    }

    public function cancel(Subscription $subscription)
    {
        $user = Auth::user();

        if ($subscription->user_id !== $user->id) {
            abort(403);
        }

        if ($subscription->status !== 'active') {
            return back()->with('error', 'Langganan ini sudah tidak aktif.');
        }

        $subscription->update(['status' => 'cancelled']);

        return back()->with('success', 'Langganan berhasil dibatalkan.');
    }
}
