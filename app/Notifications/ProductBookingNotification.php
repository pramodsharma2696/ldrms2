<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductBookingNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $booking;

    public function __construct($booking)
    {
        $this->booking = $booking;
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
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Product Booking')
            ->line('A new product has been booked. Please review the booking details.')
            ->line('Booking Number: ' . $this->booking->BookingNumber)
            ->line('Booked by: ' . $this->booking->user->first_name .''.$this->booking->user->last_name)
            ->line('Product: ' . $this->booking->product->ProductName )
            ->line('From Date: ' . $this->booking->FromDate)
            ->line('To Date: ' . $this->booking->ToDate)
            ->action('View Booking Details', route('bookings.details', $this->booking->id))
            ->line('Thank you for using our application!');
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
