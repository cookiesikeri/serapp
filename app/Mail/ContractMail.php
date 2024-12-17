<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContractMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Accord juridique et Bon de commande')
                    ->view('emails.mail');
    }
}
