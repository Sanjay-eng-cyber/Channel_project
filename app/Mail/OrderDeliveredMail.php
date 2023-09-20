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
    public $userName;
    public $product;
    public $adminMail;
    public function __construct($userName, $product, $adminMail)
    {
        $this->userName = $userName;
        $this->product = $product;
        $this->adminMail = $adminMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Product Has Been Delivered.')->markdown('mail.order-delivered-mail')->with([
            'userName' => $this->userName,
            'product' => $this->product,
            'adminMail' => $this->adminMail,
        ]);
    }
}
