<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo() {
        if (auth()->user() && auth()->user()->role === 'admin') {
            return '/admin/dashboard';
        }
        return '/dashboard';
    }

    /**
     * The user has been logged in.
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }
        return redirect('/dashboard');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->id)->first();

            if (!$user) {
                $user = User::where('email', $googleUser->email)->first();

                if (!$user) {
                    $user = new User();
                    $user->name = $googleUser->name;
                    $user->email = $googleUser->email;
                    $user->google_id = $googleUser->id;
                    $user->password = bcrypt(uniqid()); // Random password since Google handles auth
                    $user->email_verified_at = now(); // Otomatis terverifikasi karena via Google
                    $user->save();
                } else {
                    $user->google_id = $googleUser->id;
                    $user->email_verified_at = $user->email_verified_at ?? now(); // Jika sebelumnya belum verified, tandai verified
                    $user->save();
                }
            }

            Auth::login($user);

            return redirect()->intended($this->redirectTo);
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['google' => 'Unable to login with Google.']);
        }
    }
}

