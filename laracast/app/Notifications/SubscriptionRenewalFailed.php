<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage; // go here for more option
use Illuminate\Notifications\Notification;

/**
 * SEE NOTIFICATION DOCS
 * php artisan make:notification SubscriptionRenewalFailed // --markdown SubRenewFailLayout
 *
 * notifications
 * unreadNotifications
 * markAsRead
 */
class SubscriptionRenewalFailed extends Notification
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
            //see routes
        return ['mail','database']; //database ->php artisan notifications:table
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
                    // ->from('test@example.com', 'Example') //custom from
                    ->subject('New Subject')
                    ->error() //btn to red
                    ->line('The introduction to the notification.')
                    ->line('New Line')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            //data
        ];
    }
    // toDatabase
}
