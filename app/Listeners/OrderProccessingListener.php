<?php

namespace App\Listeners;

use App\Mail\OrderProccessingMail;
use Illuminate\Support\Facades\Mail;
use App\Events\OrderProccessingEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderProccessingListener implements ShouldQueue
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
     * @param  \App\Events\OrderProccessingEvent  $event
     * @return void
     */
    public function handle(OrderProccessingEvent $event)
    {
        $order = $event->order;
        if ($order->user->email) {
            Mail::to($order->user->email)->send(new OrderProccessingMail($order));
        }
    }
}
