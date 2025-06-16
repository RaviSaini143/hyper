<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmEmailChange extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
		//dd($this->user);
		if($this->user->name){
			$routeName = 'admin.confirmEmailChange';
		}else{
			$routeName = 'user.confirmEmailChange';
		}
		$url = route($routeName, ['token' => $this->user->email_change_token]);
        //$url = route('user.confirmEmailChange', ['token' => $this->user->email_change_token]);

        return $this->subject('Confirm Your Email Change')
                    ->view('emails.confirm_email_change')
                    ->with([
                        'user' => $this->user,
                        'url' => $url,
                    ]);
    }
}
