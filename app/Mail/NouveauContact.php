<?php

namespace App\Mail;

use App\Models\MessageContact;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NouveauContact extends Mailable
{
    use Queueable, SerializesModels;

    public $messageContact;

    public function __construct(MessageContact $messageContact)
    {
        $this->messageContact = $messageContact;
    }

    public function build()
    {
        return $this->subject('Nouveau message de contact')
                    ->markdown('emails.contact');
    }
}
