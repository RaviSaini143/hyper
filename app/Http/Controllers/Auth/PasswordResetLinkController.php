<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.recoverpw');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );
	 if ($status === Password::RESET_LINK_SENT) {
			session()->flash('status', 'success');
		} else {
			session()->flash('status', 'error');
		}

    return back();
	
        //return $status == Password::RESET_LINK_SENT
                  //  ? back()->with('status', __($status))
                   // : back()->withInput($request->only('email'))
                         //   ->withErrors(['email' => __($status)]);
    }
	
	 public function createUser()
    {
        return view('UserDashboard.recoverpw');
    }
	public function storeUser(Request $request)
    {
		
        $request->validate([
            'email' => 'required|email',
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::broker('add_users')->sendResetLink(
			$request->only('email')
		);

	 if ($status === Password::RESET_LINK_SENT) {
			session()->flash('status', 'success');
		} else {
			session()->flash('status', 'error');
		}

    return back();
	
        //return $status == Password::RESET_LINK_SENT
                  //  ? back()->with('status', __($status))
                   // : back()->withInput($request->only('email'))
                         //   ->withErrors(['email' => __($status)]);
    }
}
