<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class SendMailLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'from_email',
        'to_email',
        'subject',
        'body',
        'status',
        'error_message',
        'send_time_at',
    ];
}
