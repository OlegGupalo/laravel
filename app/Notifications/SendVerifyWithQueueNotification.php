<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail;

class SendVerifyWithQueueNotification extends VerifyEmail implements ShouldQueue
{
    use Queueable;
}
