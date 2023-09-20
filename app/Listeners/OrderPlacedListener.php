<?php

namespace App\Listeners;

use App\Mail\OrderPlacedMail;
use App\Events\OrderPlacedEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPlacedListener
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
        $userMail = 'sanjay@gmail.com';
        $userName = 'sanjay';
        $product = 'Alovera Gel';
        $adminMail = 'admin@test.com';
                // dd($product);
        if ($userMail) {
            Mail::to($userMail)->send(new OrderPlacedMail($userName,$product,$adminMail));
        }
    }
}
