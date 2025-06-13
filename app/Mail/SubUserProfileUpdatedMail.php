<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubUserProfileUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subuser;

    public function __construct($subuser)
    {
        $this->subuser = $subuser;
    }

    public function build()
    {
        return $this->subject('Your Profile Has Been Updated')
                    ->view('emails.subuser-profile-updated')
                    ->with([
                        'email' => $this->subuser->email,
                    ]);
    }
}
