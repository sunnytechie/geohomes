<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PlotEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $compose;
    /**
     * Create a new message instance.
     */
    public function __construct($clientName, $clientAddress, $clientCity, $clientZip, $plotName, $plotNumber, $projectAddress, $projectState, $projectName)
    {
        $this->compose = [
            'clientName' => $clientName,
            'clientAddress' =>$clientAddress,
            'clientCity' =>$clientCity,
            'clientZip' =>$clientZip,
            'plotName' =>$plotName,
            'plotNumber' =>$plotNumber,
            'projectAddress' =>$projectAddress,
            'projectState' =>$projectState,
            'projectName' =>$projectName,
        ];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Plot allocation confirmation with Geo-Homes.',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.plot',
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
