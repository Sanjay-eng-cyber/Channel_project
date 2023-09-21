<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderDeliveredMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order;
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->order);
        // dd($this->order->items()->with('product')->get());
        $productsNameArray = $this->order->items()->with('product')->get()->pluck('product.name')->toArray();
        // dd($productsNameArray);
        // dd(implode(", ", $productsNameArray));
        $order = $this->order;
        return $this->subject('Your Product Has Been Delivered.')->markdown('mail.order-delivered-mail')->with([
            'userName' => $order->user->first_name,
            'productName' => implode(", ", $productsNameArray),
            'adminMail' => config('app.enquiry_email'),
        ]);
    }
}
