<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactToAdmin extends Mailable
{
    use Queueable, SerializesModels;

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
        return $this->subject('Un utilisateur vous a contacté | ' .$this->data['subject'])->view('emails.contactToAdmin')
                    ->with([
                        'name' => $this->data['name'],
                        'email' => $this->data['email'],
                        'numberPhone' => $this->data['phoneNumber'],
                        'subject' => $this->data['subject'],
                        'content' => $this->data['content']
                    ]);
    }
}
