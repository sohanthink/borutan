<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApartmentReqReceived extends Notification
{
    use Queueable;
    public $apartment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($apartment)
    {
        $this->apartment = $apartment;
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
        $apartment = $this->apartment;
        return (new MailMessage)
        ->view('email.admin.ApartmentRequest', ['apartment' => $apartment])
        ->subject("Lägenhetsbegäran har skickats");
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
