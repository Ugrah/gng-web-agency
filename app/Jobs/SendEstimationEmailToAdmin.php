<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Mail\EstimateToAdmin;
use App\EstimatedPrice;

class SendEstimationEmailToAdmin implements ShouldQueue
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
        Mail::to('infos@gngdev.com')->send(new EstimateToAdmin($this->estimatedPrice));
    }
}
