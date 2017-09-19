<?php

namespace App\Mail;

use App\Models\Manager;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckoutAdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('teamchich26@gmail.com', 'Admin')
            ->to(Manager::first()->email, 'Admin Manager')
            ->subject($this->request->subject)
            ->view('emails.contact', ['data' => $this->request->only('name', 'email')]);
    }
}
