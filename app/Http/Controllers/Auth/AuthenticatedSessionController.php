<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();

        $request->session()->regenerate();

        $checkUser = User::where('email', $request->email)->first();

        if ($checkUser) {
            if ($checkUser->type === "admin") {
                return redirect()->intended(RouteServiceProvider::HOME);
            } else {
                $checkUser->update([
                    'last_login'=> now()
                ]);
                return redirect()->intended(RouteServiceProvider::USER);
            }
        }

        return redirect()->route('login')->withErrors([
            'email' => 'المستخدم غير موجود أو البيانات المدخلة غير صحيحة.',
        ]);


    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
