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

    public $delay = 120;

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderCancelledEvent  $event
     * @return void
     */
    public function handle(OrderCancelledEvent $event)
    {
        $order = $event->order;
        $productsNameArray = $order->items()->with('product')->get()->pluck('product.name')->toArray();
        $productsName = implode(", ", $productsNameArray);

        if ($order->user->email) {
            Mail::to($order->user->email)->send(new OrderCancelledMail($order, $productsNameArray));
        }

        if (app()->env == 'production' && $order->user->phone) {
            $res = MSG91::sms([
                "flow_id" => config('app.msg91_order_cancelled_flow_id'),
                "authkey" => config('app.msg91_auth_key'),
                "mobiles" => '91' . $order->user->phone,
                "USER" => str_limit($order->user->first_name, 27),
                "PRODUCTNAME" => str_limit($productsName, 27),
                "EMAIL" => config('app.enquiry_email'),
            ]);
            // dd($res);
        }
    }
}
