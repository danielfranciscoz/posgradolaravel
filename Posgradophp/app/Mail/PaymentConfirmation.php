<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Models\Estudiante;

class PaymentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

   
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user;
    public $estudiante;
    
    public function __construct(User $user,Estudiante $estudiante)
    {
        //
        $this->user = $user;
        $this->estudiante = $estudiante;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->view('emails.paymentconfirmation')->with([
            'user'=>$this->user,
            'estudiante'=>$this->estudiante
        ])
        ->subject('Confirmación de Pago');
    }
}
