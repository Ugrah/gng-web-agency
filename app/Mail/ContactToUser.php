<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactToUser extends Mailable
{
    use Queueable, SerializesModels;

    const TRANS_PATH = 'back/mails/default.';
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(trans(self::TRANS_PATH.'contact_to_user').$this->data['subject'])->view('emails.contactToUser')
                    ->with(['name' => $this->data['name']]);
    }
}
