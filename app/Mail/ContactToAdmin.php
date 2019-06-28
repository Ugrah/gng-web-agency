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

    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Un utilisateur vous a contacté | ' .$this->request->input('subject'))->view('emails.contactToAdmin')
                    ->with([
                        'name' => $this->request->input('name'),
                        'email' => $this->request->input('email'),
                        'numberPhone' => $this->request->input('numberPhone'),
                        'subject' => $this->request->input('subject'),
                        'content' => $this->request->input('content')
                    ]);
    }
}
