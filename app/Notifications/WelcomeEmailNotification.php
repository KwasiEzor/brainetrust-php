<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeEmailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        return (new MailMessage)
            ->line('Nous vous souhaitons la bienvenue au club de scrabble Braine Trust. Nous sommes très heureux de vous accueillir au sein de notre grande famille.')
            ->line('En vous inscrivant sur notre site, vous avez d\'ores et déjà accès à votre espace personnel. Toutefois, avant de vous connecter à la page réservée aux membres, vous devriez soit venir en personne au club ou soit nous contacter directement sur notre site ou via l\'adresse mail brainetrust@gmail.com. Merci pour votre compréhension.')
            ->action('Allez sur le site', url('/'))
            ->line('A très bientôt !');
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
