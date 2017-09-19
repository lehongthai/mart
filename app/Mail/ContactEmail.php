<?php

namespace App\Mail;

use App\Models\Manager;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $request;

    /**
     * Create a new message instance.
     *
     * ContactEmail constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
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
        return $this->from($this->request->email)
            ->to(Manager::first()->email, 'Admin Manager')
            ->subject($this->request->subject)
            ->view('emails.contact', ['data' => $this->request->only('name', 'email', 'subject', 'comments')]);
    }
}
