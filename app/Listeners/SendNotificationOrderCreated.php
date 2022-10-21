<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\Admin;
use App\Models\Supplier;
use App\Notifications\NewOrderCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendNotificationOrderCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        $order = $event->order;
        $suppliers = $order->purchasedProducts()->select('supplier_id')->groupBy('supplier_id')->get();

        foreach ($suppliers as $supplier) {
            $id = Supplier::where('id', '=', $supplier->supplier_id)->get();
            Notification::send($id, new NewOrderCreatedNotification($order));
        }

        $admin = Admin::first();
        $admin->notify(new NewOrderCreatedNotification(
            $order,
        ));
    }
}
