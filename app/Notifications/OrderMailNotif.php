<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderMailNotif extends Notification implements ShouldQueue
{
    use Queueable;

    public $orders;
    public $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->orders = $order;
        switch ($this->orders->OrderStatus) {
            case 1:
                $this->message = 'در حال بررسی';
                break;
            case 2:
                $this->message = 'در حال آماده سازی';
                break;
            case 3:
                $this->message = 'ارسال به مقصد';
                break;
            case 4:
                $this->message = 'تحویل گرفته شد';
        }

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Your Total Price is : ' . $this->orders->Total_price)
            ->line('Your OrderStatus is : ' . $this->message)
            ->action('Notification Action', url('/'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
