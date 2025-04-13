<?php

namespace App\Mail;

use App\Models\UncertifiedUser;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

final class UserAuthenticationMail extends Mailable
{
    use Queueable, SerializesModels;

    private readonly UncertifiedUser $uncertified_user;

    /**
     * Create a new message instance.
     */
    public function __construct(UncertifiedUser $uncertified_user)
    {
        $this->uncertified_user = $uncertified_user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'アカウント新規登録認証',
            to: $this->uncertified_user->email
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.user_authentication',
            with: [
                'uncertified_user' => $this->uncertified_user
            ],
        );
    }
}
