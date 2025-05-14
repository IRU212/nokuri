<?php

namespace App\Mail;

use App\Models\AdminVerifyCode;
use App\Models\UncertifiedUser;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

final class AdminVerifyCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    private readonly AdminVerifyCode $admin_verify_code;

    /**
     * Create a new message instance.
     */
    public function __construct(AdminVerifyCode $admin_verify_code)
    {
        $this->admin_verify_code = $admin_verify_code;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '管理者ログインコード認証',
            to: $this->admin_verify_code->email
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.admin_verify_code',
            with: [
                'admin_verify_code' => $this->admin_verify_code
            ],
        );
    }
}
