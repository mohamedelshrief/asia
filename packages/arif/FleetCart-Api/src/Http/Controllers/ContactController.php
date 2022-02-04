<?php


namespace FleetCartApi\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;

class ContactController
{
    public function store(Request $request)
    {
        $roles = config('fleetcart_api.contact.validation_roles');
        $messages = config('fleetcart_api.contact.validation_messages');
        $request->validate($roles, $messages);

        $mailable = config('fleetcart_api.contact.mailable');

        Mail::to("info@apmpllc.com")->send(new $mailable());

        Event::dispatch('contact.submitted', $request->all());

        return response()->json(['message' => "Contact form submitted!"]);
    }
}
