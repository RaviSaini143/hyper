<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProfileUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Profile Has Been Updated!'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.profile-update',
            with: [
                'name' => $this->name,
                'email' => $this->email
            ]
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
