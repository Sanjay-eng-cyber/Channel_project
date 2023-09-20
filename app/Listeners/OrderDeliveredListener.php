<?php

namespace App\Listeners;

use App\Mail\OrderDeliveredMail;
use App\Events\OrderDeliveredEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderDeliveredListener
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
        $userMail = 'sanjay@gmail.com';
        $userName = 'sanjay';
        $product = 'Alovera Gel';
        $adminMail = 'admin@test.com';
                // dd($product);
        if ($userMail) {
            Mail::to($userMail)->send(new OrderDeliveredMail($userName,$product,$adminMail));
        }
    }
}
