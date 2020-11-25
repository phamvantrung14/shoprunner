<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    private  $data;
    private  $total_price;
    private $name;
    public function __construct($data,$total_price,$name)
    {
        $this->data = $data;
        $this->total_price = $total_price;
        $this->name = $name;
    }
    private $pathToFile = "frontend/img/logo/logorun3.png";
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.email.shopping')->with([
            'data' => $this->data,
            'total_price'=>$this->total_price,
            'pathToFile'=> $this->pathToFile,
            'name'=>$this->name,
        ]);
    }
}
