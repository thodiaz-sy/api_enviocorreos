<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CorreoMailable extends Mailable
{
    public $data;
    public $plantillacorreo;
    public $asuntocorreo;

    public function __construct($data, $plantillacorreo, $asuntocorreo)
    {
        $this->data = [ 'nombre' => 'John Doe',
                        'order_id' => 1234,
                        'mensaje' => 'pruebaa probando'
                    ];
                    
        $this->plantillacorreo = 'correos.'.$plantillacorreo;
        $this->asuntocorreo = $asuntocorreo;
    }

    public function build()
    {
        return $this->subject($this->asuntocorreo)
                    ->view($this->plantillacorreo)
                    ->with('data', $this->data);
    }


}
