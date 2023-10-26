<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InscriptionNotification extends Notification
{
    use Queueable;

    public $inscription_id;
    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct($inscription_id) // Ajoutez un paramètre au constructeur
    {
        $this->inscription_id = $inscription_id; // Stockez l'ID de l'inscription
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
        $confirmationUrl = url("/confirmation/{$this->inscription_id}");
        return (new MailMessage)
        ->line('Bienvenue sur notre site.')
        ->action('Confirmer votre inscription', $confirmationUrl)
        ->line('Merci de votre inscription !');
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
