<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\EstimatedPrice;

class EstimateToAdmin extends Mailable
{
    use Queueable, SerializesModels;

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

        return $this->subject('Un utilisateur a estimé le prix de son application mobile')->view('emails.estimateToAdmin')
                    ->with([
                        'estimatedPrice' => $this->estimatedPrice,
                        'numberSeparator' => $numberSeparator,
                        'decimalSeparator' => $decimalSeparator,
                    ]);
    }
}
