<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MonthlyReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $pdf;
    public $currentMonth;

    public function __construct($user, $pdf, $currentMonth)
    {
        $this->user = $user;
        $this->pdf = $pdf;
        $this->currentMonth = $currentMonth;
    }

    public function build()
    {
        return $this->subject("B-15 Mess {$this->currentMonth} Expenses")
                    ->view('emails.monthlyReport')
                    ->attachData($this->pdf->output(), "monthly_report.pdf", [
                        'mime' => 'application/pdf',
                    ]);
    }
}





// class MonthlyReportMail extends Mailable
// {
//     use Queueable, SerializesModels;

//     /**
//      * Create a new message instance.
//      */
//     public function __construct()
//     {
//         //
//     }

//     /**
//      * Get the message envelope.
//      */
//     public function envelope(): Envelope
//     {
//         return new Envelope(
//             subject: 'Monthly Report Mail',
//         );
//     }

//     /**
//      * Get the message content definition.
//      */
//     public function content(): Content
//     {
//         return new Content(
//             view: 'view.name',
//         );
//     }

//     /**
//      * Get the attachments for the message.
//      *
//      * @return array<int, \Illuminate\Mail\Mailables\Attachment>
//      */
//     public function attachments(): array
//     {
//         return [];
//     }
// }
