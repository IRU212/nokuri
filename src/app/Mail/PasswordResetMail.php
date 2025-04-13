<?php

namespace App\Mail;

use App\Models\PasswordResetUser;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var PasswordResetUser
     */
    private readonly PasswordResetUser $password_reset_user;

    /**
     * Create a new message instance.
     */
    public function __construct(PasswordResetUser $password_reset_user)
    {
        $this->password_reset_user = new PasswordResetUser();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'パスワードリセット',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.user_password_reset',
            with: [
                'password_reset_user' => $this->password_reset_user
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
