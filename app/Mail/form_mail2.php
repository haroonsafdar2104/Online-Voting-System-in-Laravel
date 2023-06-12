<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class form_mail2 extends Mailable
{
use Queueable, SerializesModels;
public $details;
/**
* Create a new message instance.
* @return void
*/
public function build()
{
    return $this->subject($this->details['subject'])
    // ->attach($this->details['file'], ['as' => $this->details['file']->getClientOriginalName()])
    // Attach the file
    // ->attach($this->details['file'])
    ->view('Mails.mail2');
}
public function __construct($details)
{
$this->details = $details;
}
/**
* Get the message envelope.
* @return \Illuminate\Mail\Mailables\Envelope
*/
public function envelope()
{
    return new Envelope(['subject' => $this->$details['subject']]);
}
public function content()
{
    return new Content('Mails.mail2');
}
}

