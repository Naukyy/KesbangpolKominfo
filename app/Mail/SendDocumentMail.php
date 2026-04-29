<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendDocumentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $keterangan;
    public $filePdf;

    public function __construct($keterangan, $filePdf)
    {
        $this->keterangan = $keterangan;
        $this->filePdf = $filePdf;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pengiriman Dokumen PDF',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.document',
        );
    }

    public function attachments(): array
    {
        // Mengambil langsung dari file temporary yang di-upload
        return [
            Attachment::fromPath($this->filePdf->getRealPath())
                ->as($this->filePdf->getClientOriginalName())
                ->withMime('application/pdf'),
        ];
    }
}