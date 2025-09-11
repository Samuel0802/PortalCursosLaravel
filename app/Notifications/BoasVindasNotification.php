<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BoasVindasNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }


    public function via(object $notifiable): array
    {
        //// aqui diz que é por email
        return ['mail'];
    }

    /**
     * Conteudo do email
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Bem-vindo ao Portal Cursos')
            ->greeting('Olá, ' . $notifiable->name . '!' )
            ->line('Seja muito bem-vindo ao nosso sistema')
            ->action('Acesse agora', url('http://127.0.0.1:8000/login'))
            ->line('Obrigado por usar nossa aplicação!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
