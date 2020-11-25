<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped2 extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private  $data;
    private  $total_price;
    public function __construct($data,$total_price)
    {
        $this->data = $data;
        $this->total_price = $total_price;
    }
    private $pathToFile = "frontend/img/logo/logorun3.png";

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.shipped')->with([
            'data' => $this->data,
            'total_price'=>$this->total_price,
            'pathToFile'=> $this->pathToFile,

        ]);
    }
}
