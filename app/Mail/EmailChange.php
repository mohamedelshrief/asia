<?php

namespace FleetCart\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailChange extends Mailable
{
    use Queueable, SerializesModels;

    public $email="";
    public $code="";
    public function __construct($email,$code)
    {
        $this->email=$email;
        $this->code=$code;
    }

    public function build()
    {
        return $this
            ->from(config('fleetcart_api.contact.from_email'))
            ->subject("Email change Verification")
            ->view('emails.emailChange');
    }
}
