<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Order;
use App\Models\User;

class OrderEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $order;
    public $user;
   
    
    public function __construct(Order $order,User $user)
    {
       $this->order = $order;
       $this->user  = $user ;
    }

   
    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Dear '.$this->order->customer->name)
                    ->line('Your order has been placed successfully '.$this->order->user->name)
                    ->line('Your Order ID is '.$this->order->id)
                    ->action('View Details ', route('order.details',$this->order->id))
                    ->line('Thank you for using our application!');
    }

   
}
