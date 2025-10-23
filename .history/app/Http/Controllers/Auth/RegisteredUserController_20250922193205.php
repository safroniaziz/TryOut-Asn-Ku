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
            'phone' => ['required', 'string', 'max:20'],
            'target_test' => ['required', 'string', 'max:50'],
            'experience_level' => ['required', 'in:beginner,intermediate,experienced'],
            'target_institution' => ['nullable', 'string', 'max:255'],
            'referral_code' => ['nullable', 'string', 'max:50'],
            'motivation' => ['required', 'in:serve_nation,job_security,career_growth,family_dream,other'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
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
