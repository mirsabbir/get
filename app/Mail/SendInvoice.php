<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendInvoice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $invoice,$p;
    public function __construct($invoice,$p)
    {
        $this->invoice = $invoice;
        $this->p = $p;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.invoice')->with([
            'invoice' => $this->invoice,
            'products' => $this->p, 
        ]);
    }
}
