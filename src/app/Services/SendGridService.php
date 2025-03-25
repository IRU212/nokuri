<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;
use SendGrid;
use SendGrid\Mail\Mail;

final class SendGridService
{
    private readonly string $api_key;

    private readonly string $from_address;

    private readonly SendGrid $send_grid;

    private Mail $send_grid_mail;

    public function __construct()
    {
        $this->api_key = '';
        $this->from_address = '';
        $this->send_grid = new SendGrid($this->api_key);
        $this->send_grid_mail = new Mail();
    }

    public function snedMail(string $subject, string $to_address, string $mail_content_path, array $data): void
    {
        $this->send_grid_mail->setFrom($this->from_address);
        $this->send_grid_mail->setSubject($subject);
        $this->send_grid_mail->addTo($to_address);
        $this->send_grid_mail->addContent("text/plain", strval($mail_content_path), compact('data'));
        $this->send_grid_mail->addContent("text/html", strval($mail_content_path), compact('data'));

        try {
            $this->send_grid->send($this->send_grid_mail);
        } catch (Exception $e) {
            Log::error("SendGridメール送信でエラーが起きました");
        }
    }
}
