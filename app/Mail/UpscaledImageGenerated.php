<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UpscaledImageGenerated extends Mailable
{
    use Queueable, SerializesModels;

    public $scaleObject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($scaleObject)
    {
        //
        $this->scaleObject = $scaleObject;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Upscaled Image Generated',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.upscaled_image_generated',
            with: [
                'url' => $this->scaleObject->getFirstMedia('upscaled')->getUrl()
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
