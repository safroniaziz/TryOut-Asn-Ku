<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    public function premium()
    {
        $user = Auth::user();
        $currentSubscription = $user->getActivePremiumSubscription();

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
            'payment_method' => 'required|string',
        ]);

        // For demo purposes, we'll create subscription immediately
        // In real app, this would integrate with payment gateway
        $subscription = Subscription::create([
            'user_id' => $user->id,
            'tanggal_mulai' => now(),
            'tanggal_akhir' => now()->addYear(), // 1 year subscription
            'status' => 'active',
            'amount' => 199000, // Rp 199,000
            'payment_method' => $request->payment_method,
            'transaction_id' => 'TXN_' . time() . '_' . $user->id,
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Selamat! Langganan premium Anda sudah aktif selama 1 tahun.');
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
