<?php

namespace App\Jobs;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;
use App\Mail\AdminResponseToUser;
use App\AdminResponse;

class SendAdminResponseToUserEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $adminResponse;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(AdminResponse $adminResponse)
    {
        $this->adminResponse = $adminResponse;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->adminResponse->recipient)
            ->send(new AdminResponseToUser($this->adminResponse));
    }
}
