<?php

namespace App\Listeners;

use App\Mail\OrderProccessingMail;
use Illuminate\Support\Facades\Mail;
use App\Events\OrderProccessingEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderProccessingListener
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
        $userMail = 'sanjay@gmail.com';
        $userName = 'sanjay';
        $product = 'Alovera Gel';
        $adminMail = 'admin@test.com';
                // dd($product);
        if ($userMail) {
            Mail::to($userMail)->send(new OrderProccessingMail($userName,$product,$adminMail));
        }
    }
}
