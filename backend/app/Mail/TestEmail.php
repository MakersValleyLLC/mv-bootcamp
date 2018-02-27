<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    	//NO NEEDS TO RECEIVE BODY DATA
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    	$data = ['message' => 'This is a test!'];
        $address = 'casabiancadenny@gmail.com';
        $subject = 'This is a demo!';
        $name = 'Denny';

        return $this->view('emails.test')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 'message' => $data['message'] ]);

    }
}
