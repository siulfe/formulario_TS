<?php

namespace App\Mail;

use App\Resource;
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
                    ->attachData(\Storage::disk('public')->get(Resource::filesPath("products.pdf")), 'productos.pdf')
                    ->with([
                        'name' => 'Tech Solution',
                    ]);
    }
}
