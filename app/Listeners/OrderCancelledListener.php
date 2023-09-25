<?php

namespace App\Listeners;

use App\Lib\MSG91\MSG91;
use App\Mail\OrderCancelledMail;
use App\Events\OrderCancelledEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCancelledListener implements ShouldQueue
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

        if ($order->user->phone) {
            $res = MSG91::sms([
                "flow_id" => config('app.MSG91_ORDER_CANCELLED_FLOW_ID'),
                "authkey" => config('app.msg91_auth_key'),
                "mobiles" => '91' . $order->user->phone,
                "NAME" => str_limit($order->user->full_name, 27),
            ]);
            // dd($res);
        }
    }
}
