<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckoutEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $listCart;

    private $request;

    public function __construct($listCart, $request)
    {
        $this->listCart = $listCart;
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('teamchich26@gmail.com')
            ->to($this->request->email, $this->request->name)
            ->subject('Don Hang Vua Dat')
            ->view('emails.order', ['listCart' => $this->listCart, 'data' => $this->request->all()]);
    }
}
