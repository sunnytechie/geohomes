<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FinalPaperMail extends Mailable
{
    use Queueable, SerializesModels;
    public $compose;

    /**
     * Create a new message instance.
     */
    public function __construct($recipient, $clientName, $clientAddress, $clientCity, $clientZip, $projectName, $projectAddress, $projectState)
    {
        $this->compose = [
            'recipient' => $recipient,
            'clientName' => $clientName,
            'clientAddress' =>$clientAddress,
            'clientCity' =>$clientCity,
            'clientZip' =>$clientZip,
            'projectName' => $projectName,
            'projectAddress' => $projectAddress, 
            'projectState' => $projectState
        ];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Final Paper Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.FinalPaper',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
