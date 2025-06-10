<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class CustomVerifyEmail extends VerifyEmailBase
{
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject('Подтвердите ваш email адрес')
            ->greeting('Здравствуйте!')
            ->line('Пожалуйста, нажмите на кнопку ниже, чтобы подтвердить ваш email адрес.')
            ->action('Подтвердить Email', $verificationUrl)
            ->line('Если вы не регистрировались, просто проигнорируйте это письмо.')
            ->salutation('С уважением, Ваша команда');
    }

    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify', 
            Carbon::now()->addMinutes(config('auth.verification.expire', 60)), 
            ['id' => $notifiable->getKey(), 'hash' => sha1($notifiable->getEmailForVerification())]
        );
    }
}
