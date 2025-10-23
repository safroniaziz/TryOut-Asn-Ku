<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'whatsapp' => ['required', 'string', 'max:20', 'regex:/^[0-9+\-\s()]+$/'],
            'city' => ['required', 'string', 'max:100'],
            'education_level' => ['required', 'in:SMA,D3,S1,S2,S3'],
            'work_status' => ['required', 'in:mahasiswa,pengangguran,swasta,pns,freelancer,wiraswasta'],
            'target_score' => ['nullable', 'integer', 'min:100', 'max:500'],
            'used_referral_code' => ['nullable', 'string', 'max:20', 'exists:users,my_referral_code'],
            'phone' => ['nullable', 'string', 'max:20'],
            'target_test' => ['nullable', 'string', 'max:50'],
            'experience_level' => ['nullable', 'in:beginner,intermediate,experienced'],
            'target_institution' => ['nullable', 'string', 'max:255'],
            'referral_code' => ['nullable', 'string', 'max:50'],
            'motivation' => ['nullable', 'in:serve_nation,job_security,career_growth,family_dream,other'],
        ]);

        // Handle referral system
        $parentId = null;
        if ($request->used_referral_code) {
            $parent = User::where('my_referral_code', $request->used_referral_code)->first();
            if ($parent) {
                $parentId = $parent->id;
            }
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'whatsapp' => $request->whatsapp,
            'city' => $request->city,
            'education_level' => $request->education_level,
            'work_status' => $request->work_status,
            'target_score' => $request->target_score,
            'my_referral_code' => User::generateReferralCode(),
            'parent_id' => $parentId,
            'used_referral_code' => $request->used_referral_code,
            'phone' => $request->phone,
            'target_test' => $request->target_test,
            'experience_level' => $request->experience_level,
            'target_institution' => $request->target_institution,
            'referral_code' => $request->referral_code,
            'motivation' => $request->motivation,
            'newsletter' => $request->has('newsletter'),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
