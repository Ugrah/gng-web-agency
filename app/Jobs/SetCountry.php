<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Request;

class SetCountry implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if(!session()->has('country_iso_code'))
        {
            $arr_ip = geoip(request()->ip());

            switch ($arr_ip['attributes']['iso_code']) {
                case 'MA':
                    session()->put('country_iso_code', 'ma');
                    break;
                case 'CI':
                    session()->put('country_iso_code', 'ci');
                    break;
                default:
                    session()->put('country_iso_code', 'other');
            }
        }
    }
}
