<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TransferReceived extends Notification
{
    use Queueable;

    public $amount;
    /**
     * Create a new notification instance.
     */
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Voce recebeu uma tranferencia')
            ->greeting('Olá'. $notifiable->name)
            ->line('Você recebeu R$' . $this->amount . 'na sua carteira.')
            ->line('Obrigado!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    
    public function toArray(object $notifiable): array
    {
        return [
            'amount' => $this->amount,
            'message' => "Você recebeu R$ {$this->amount} na sua carteira."
        ];
    }
}
