<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Mail\EstimateToUser;
use App\EstimatedPrice;

class SendEstimationEmailToUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $estimatedPrice;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(EstimatedPrice $estimatedPrice)
    {
        $this->estimatedPrice = $estimatedPrice;  
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->estimatedPrice->email)->send(new EstimateToUser($this->estimatedPrice));
    }
}
