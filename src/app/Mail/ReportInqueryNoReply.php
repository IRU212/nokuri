<?php

namespace App\Mail;

use App\Models\AdminUser;
use App\Models\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReportInqueryNoReply extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Inquiry
     */
    private readonly Inquiry $inquiry;

    /**
     * @var AdminUser
     */
    private readonly AdminUser $admin_user;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        $this->inquiry = new Inquiry();
        $this->admin_user = new AdminUser();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '未返信問い合わせ一覧',
            to: $this->admin_user->display()->pluck('email')->map(fn($email) => new Address($email))->all(),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.report-inquery-no-replay',
            with: [
                'no_reply_inqueries' => $this->inquiry->query()->where('is_reply', false)->get(),
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
