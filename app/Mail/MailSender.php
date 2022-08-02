<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSender extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    protected $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messageData)
    {
        $this->message = $messageData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.template')
            ->from([
                'address' => env('MAIL_FROM_ADDRESS', 'sempai@piotrbenedyk.pl'),
                'name' => env('MAIL_FROM_NAME', 'SEMPAI Mailer'),
            ])
            ->subject($this->message->title)
            ->with(['msg' => $this->message]);
    }
}
