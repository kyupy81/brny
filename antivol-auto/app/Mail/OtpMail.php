<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Votre Code de Validation (OTP)',
        );
    }

    public function content(): Content
    {
        return new Content(
            htmlString: '
                <div style="font-family: sans-serif; padding: 20px; background: #f3f4f6;">
                    <div style="max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <h2 style="color: #1f2937; margin-bottom: 20px;">Code de Validation</h2>
                        <p style="color: #4b5563; margin-bottom: 20px;">Vous avez demandé une action sensible. Voici votre code de validation :</p>
                        <div style="background: #e5e7eb; padding: 15px; text-align: center; font-size: 24px; font-weight: bold; letter-spacing: 5px; border-radius: 4px; margin-bottom: 20px;">
                            ' . $this->code . '
                        </div>
                        <p style="color: #6b7280; font-size: 14px;">Ce code expire dans 10 minutes.</p>
                    </div>
                </div>
            ',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
