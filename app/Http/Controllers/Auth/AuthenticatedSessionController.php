<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\AddUser;
use App\Models\AddSubUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendOtpMail;
use App\Mail\SendUserOtpMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
    /* public function store(LoginRequest $request)
    {

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
        

   
    } */

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
       /*  public function storeuser(LoginUserRequest $request)
    {
	
			$credentials = $request->only('email', 'password');
			$addUser = AddUser::where('email', $credentials['email'])->first();
			
			
				
			if ($addUser && Hash::check($credentials['password'], $addUser->password)) {
				if ($addUser->status == 1) {
					return back()->withErrors([
						'email' => 'Permission denied. Your account is inactive. Please contact for your admin.',
					]);
				}

				Auth::guard('add_user')->login($addUser);
				$request->session()->regenerate();

				if (in_array($addUser->user_type, ['user', 'subuser'])) {
					return redirect()->route('user.dashboard');
				} else {
					return redirect()->back();
				}

			}
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

   
    } */

    public function destroyuser(Request $request)
    {
      
        if (Auth::guard('add_user')->check()) {
                Auth::guard('add_user')->logout();
            }
                $request->session()->invalidate();

                $request->session()->regenerateToken();

                return redirect()->route('login.user');
    }

	public function verifyOtp(Request $request)
	{
		$user = User::where('email', $request->email)->first();
		 $clientIp = $this->getClientIP();
 
		
	
		if (!$user) {
			return response()->json([
				'status' => 'error',
				'message' => 'Please enter valid credentials...'
			], 422);
		}
		/* if ($user->ip_address !== $clientIp) {
		   return response()->json([
					'status' => 'error',
					'message' => 'Unauthorized login from this IP address.'
				], 422);
		} */
		$otp = rand(100000, 999999);
		$user->otp_code = $otp;
		$user->save();
		Mail::to($user->email)->send(new SendOtpMail($user->name, $otp));
		return response()->json(['success' => 'OTP sent to your email.']);
	}
	public function verifyOtpCode(Request $request){
		 $request->validate([
			'otp_code' => 'required|string'
		]);
		$user = User::where('otp_code','=',$request->otp_code)->first();
		if (!$user) {
			return response()->json([
				'status' => 'error',
				'message' => 'Invalid OTP code.'
			], 422);
		}
		Auth::login($user);
		$user->otp_code = null;
		$user->save();
		$request->session()->regenerate();
		return response()->json(['success' => 'Please enter the OTP sent to your email.']);
		//return redirect()->intended(RouteServiceProvider::HOME);
	}
	
	public function verifyOtpUser(Request $request)
	{
		$user = AddUser::where('email', $request->email)->first();
		if ($user->deleted_at == 1) {
			
			return response()->json([
				'status' => 'error',
				'message' => 'User Not found'
			], 422);
		}
		if (!$user || !Hash::check($request->password, $user->password)) {
			return response()->json([
				'status' => 'error',
				'message' => 'Please enter valid credentials...'
			], 422);
		}
		
        if ($user->status == 1) {
			
			return response()->json([
				'status' => 'error',
				'message' => 'Permission denied. Your account is inactive. Please contact your admin.'
			], 422);
		}
		$otp = rand(100000, 999999);
		$user->otp_code = $otp;
		$user->save();
		Mail::to($user->email)->send(new SendUserOtpMail($user->name, $otp));
		return response()->json(['success' => 'OTP sent to your email.']);
	}
	
	public function verifyOtpCodeUser(Request $request)
	{
		
		$request->validate([
			'otp_code' => 'required|string',
			'email' => 'required|email',
			'password' => 'required|string',
		]);

		$user = AddUser::where('otp_code', $request->otp_code)
					   ->first();

		if (!$user) {
			return response()->json([
				'status' => 'error',
				'message' => 'Invalid OTP code.'
			], 422);
		}
		Auth::guard('add_user')->login($user);

		$user->otp_code = null;
		$user->save();

		$request->session()->regenerate();
$userType = Str::lower($user->user_type);
$redirectUrl = match ($userType) {
    'user' => route('user.dashboard'),
    'subuser' => route('subuser.homedashboard'),
};

if (!$redirectUrl) {
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid user type.'
        ], 400);
    }

    return response()->json([
        'status' => 'success',
        'redirect' => $redirectUrl
    ]);
		/* return response()->json([
			'status' => 'success',
			'redirect' => route('user.dashboard')
		]); */
	}
	private function getClientIP()
{
    if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    } elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return filter_var($ip, FILTER_VALIDATE_IP) ? $ip : 'Unknown';
}

}
