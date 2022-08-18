<?php


namespace FleetCartApi\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class changeEmail extends Mailable
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
            ->subject(config('fleetcart_api.contact.subject'))
            ->view('fleetcart_api::emails.emailChange');
    }

}
