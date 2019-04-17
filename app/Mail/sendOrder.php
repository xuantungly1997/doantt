<?php

namespace App\Mail;
use App\Order;
use App\OrderDetail;
use App\About;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order;
    public $orderdetails;
    public $about;

    public function __construct($order,$orderdetails,$about)
    {
        $this->order = $order;
        $this->orderdetails = $orderdetails;
        $this->about = $about;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hotrounihop@gmail.com')->view('client.email.email');
    }
}
