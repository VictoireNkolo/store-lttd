<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class RegisteredNotification extends Notification
{
    use Queueable;

    private $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
        $url = url('http://blog_laravel.test/');
        return (new MailMessage)
            ->from('larablog@blog.com', 'Lara-Blog')
            ->subject('Confirmation de création de compte')
            ->greeting('Bonjour cher(e) ' . $this->user->name . ' !')
            ->line('Votre compte sur notre plateforme a été créé avec succès !')
            ->line('Vos paramètres de connexion: ')
            ->line('- Role : ' . $this->user->role)
            ->line('- Email : ' . $this->user->email)
            ->line('- Mot de passe : ' . $this->user->password)
            ->action('Me connecter', $url)
            ->line('Nous vous recommandons de modifier votre mot de passe une fois connecté !')
            ->line('Merci d\'utiliser notre plateforme !');
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
