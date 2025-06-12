<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\AddUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
        

   
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        //Auth::guard('web')->logout();
      if (Auth::guard('web')->check()) {
                Auth::guard('web')->logout();
            }
                $request->session()->invalidate();

                $request->session()->regenerateToken();

                return redirect('/admin/login');
    }
    
    public function createuser()
        {
            return view('auth.user-login');
        }
        public function storeuser(LoginUserRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $addUser = AddUser::where('email', $credentials['email'])->first();

        if ($addUser && Hash::check($credentials['password'], $addUser->password)) {
            Auth::guard('add_user')->login($addUser);
            $request->session()->regenerate();

            if ($addUser->user_type === 'user') {
                return redirect()->route('user.dashboard');
            } else {
                return redirect()->back();
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

   
    }

    public function destroyuser(Request $request)
    {
      
        if (Auth::guard('add_user')->check()) {
                Auth::guard('add_user')->logout();
            }
                $request->session()->invalidate();

                $request->session()->regenerateToken();

                return redirect()->route('login.user');
    }
}
