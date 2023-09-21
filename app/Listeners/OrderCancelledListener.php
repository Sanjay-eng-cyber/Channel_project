<?php

namespace App\Listeners;

use App\Mail\OrderCancelledMail;
use App\Events\OrderCancelledEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCancelledListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderCancelledEvent  $event
     * @return void
     */
    public function handle(OrderCancelledEvent $event)
    {
        $order = $event->order;
        if ($order->user->email) {
            Mail::to($order->user->email)->send(new OrderCancelledMail($order));
        }
    }
}
