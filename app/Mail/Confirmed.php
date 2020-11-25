<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Confirmed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $data;
    private $name;
    private $total_price;
    public function __construct($data,$name,$total_price)
    {
        $this->data = $data;
        $this->name = $name;
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
        return $this->view('admin.email.confirmed')->with([
            'data' => $this->data,
            'pathToFile'=> $this->pathToFile,
            'name'=>$this->name,
            'total_price'=>$this->total_price
        ]);
    }
}
