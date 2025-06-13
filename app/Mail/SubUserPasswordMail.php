<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubUserPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subUser;
    public $plainPassword;

    public function __construct($subUser, $plainPassword)
    {
        $this->subUser = $subUser;
        $this->plainPassword = $plainPassword;
    }

    public function build()
    {
        return $this->subject('Your Subuser Account Password')
                    ->view('emails.subuser_password');
    }
}
