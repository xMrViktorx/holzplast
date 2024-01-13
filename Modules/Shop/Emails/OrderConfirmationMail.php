<?php

namespace Modules\Shop\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
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
        $billing_address = $this->order->billing_address;
        $shipping_address = $this->order->shipping_address;

        return $this->subject('Rendelési megerősítés - Holz-Plast Kft.')->view('shop::email.order-confirmation', compact('billing_address', 'shipping_address'));
    }
}
