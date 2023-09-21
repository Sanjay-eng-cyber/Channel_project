<?php

namespace App\Listeners;

use App\Mail\OrderDeliveredMail;
use App\Events\OrderDeliveredEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderDeliveredListener implements ShouldQueue
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
     * @param  \App\Events\OrderDeliveredEvent  $event
     * @return void
     */
    public function handle(OrderDeliveredEvent $event)
    {
        $order = $event->order;
        if ($order->user->email) {
            Mail::to($order->user->email)->send(new OrderDeliveredMail($order));
        }
    }
}
