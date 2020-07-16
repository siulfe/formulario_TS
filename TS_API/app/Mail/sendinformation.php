<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendinformation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $demo;

    public function __construct($user)
    {
        $this->demo = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.emailProducts')
                    ->text('mails.emailProducts_plain')
                    ->subject('Calculos de Proyecto de Bandejas Portables')
                    ->attach(public_path()."/storage/files/products.pdf", [
                              'as' => 'productos.pdf',
                              'mime' => 'text/pdf',
                      ]);
    }
}
