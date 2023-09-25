<?php

namespace App\Listeners;

use App\Lib\MSG91\MSG91;
use App\Mail\OrderPlacedMail;
use App\Events\OrderPlacedEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPlacedListener implements ShouldQueue
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
     * @param  \App\Events\OrderPlacedEvent  $event
     * @return void
     */
    public function handle(OrderPlacedEvent $event)
    {
        $order = $event->order;
        if ($order->user->email) {
            Mail::to($order->user->email)->send(new OrderPlacedMail($order));
        }

        if ($order->user->phone) {
            $res = MSG91::sms([
                "flow_id" => config('app.msg91_profile_rejected_flow_id'),
                "authkey" => config('app.msg91_auth_key'),
                "mobiles" => '91' . $order->user->phone,
                "NAME" => str_limit($order->user->full_name, 27),
            ]);
            // dd($res);
        }
    }
}
