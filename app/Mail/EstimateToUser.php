<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\EstimatedPrice;

class EstimateToUser extends Mailable
{
    use Queueable, SerializesModels;

    const TRANS_PATH = 'back/mails/default.';
    public $estimatedPrice;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EstimatedPrice $estimatedPrice)
    {
        $this->estimatedPrice = $estimatedPrice; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $numberSeparator = app()->getLocale() == 'fr' ? ' ' : ',';
        $decimalSeparator = app()->getLocale() == 'fr' ? ',' : '.';

        return $this->subject(trans(self::TRANS_PATH.'estimate_to_user'))->view('emails.estimateToUser')
                    ->with([
                        'estimatedPrice' => $this->estimatedPrice,
                        'numberSeparator' => $numberSeparator,
                        'decimalSeparator' => $decimalSeparator,
                    ]);
    }
}
