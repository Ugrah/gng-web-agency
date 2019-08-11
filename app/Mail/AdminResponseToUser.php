<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\AdminResponse;

class AdminResponseToUser extends Mailable
{
    use Queueable, SerializesModels;

    public $adminResponse;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(AdminResponse $adminResponse)
    {
        $this->adminResponse = $adminResponse;
    } 

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('RE: '.$this->adminResponse->subject)->markdown('emails.admin_response_to_user')->with(['content' => $this->adminResponse->content]);
    }
}
