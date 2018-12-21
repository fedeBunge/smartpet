<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;

class SmartPetResetPassword extends ResetPasswordNotification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
      // dd($this->token);
      return (new MailMessage)
          ->from('reset-password@smartpet.com')
          ->subject('Restablecer contraseña')
          ->line('Te enviamos este correo debido a que recibimos una solicitud para restablecer la contraseña de tu cuenta.')
          // ->action('Restablecer contraseña', url(config('app.url').route('password.reset', $this->token, false)))
          ->action('Restablecer contraseña', url(route('password.reset', $this->token, false)))
          ->line('Si no realizaste esta solicitud, puedes desconsiderar este correo.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
