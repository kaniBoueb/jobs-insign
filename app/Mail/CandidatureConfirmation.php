<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Offre;

class CandidatureConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $offre;

    /**
     * Create a new message instance.
     */
    public function __construct(Offre $offre)
    {
        $this->offre = $offre;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation de candidature',
        );
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from('hello@insign.africa')
                    ->view('emails.candidature_confirmation')
                    ->with(['offre' => $this->offre]);
    }
}

