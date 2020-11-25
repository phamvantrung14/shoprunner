<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private  $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

     private $pathToFile = "frontend/img/logo/logorun3.png";

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.email.reset-pas')->with([
            'route' => $this->data,
            'pathToFile'=> $this->pathToFile,
        ]);
    }
}
