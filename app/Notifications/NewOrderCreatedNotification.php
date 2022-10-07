<?php

namespace App\Notifications;

use App\Models\Order;
use App\Models\order_product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderCreatedNotification extends Notification
{
    use Queueable;

    protected $order;
    protected $product_name;
    protected $quantity;
    protected $size;
    protected $color;
    protected $image;
    protected $price;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order , $product_name, $quantity ,$size ,$color ,$image , $price)
    {
        $this->order        = $order;
        $this->product_name = $product_name;
        $this->quantity     = $quantity;
        $this->size         = $size;
        $this->color        = $color;
        $this->image        = $image;
        $this->price        = $price;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //         ->subject('New Order')                      //Message text

    //         ->greeting('Hello, ' . $notifiable->name)  //Welcome message to the customer
    //         ->line('The introduction to the notification.')
    //         ->action('Notification Action', url('/'))
    //         ->line('Thank you for using our application!');
    // }

    public function toDatabase($notifiable)
    {
        
        return[
            'title'      => $this->order->number ,
            'body'       =>  $this->product_name,
            'quantity'   =>  ' X ' .$this->quantity,
            'size'       =>  $this->size  ,
            'color'      =>  $this->color ,
            'icon'       =>  $this->image ,
            'price'      =>  $this->price ,
            'order_id'   =>  $this->order->id,
        ];
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
