<?php

namespace App\Http\Middleware;

use Closure;
use App\Jobs\SetLocale;
use App\Jobs\SetCountry;
use Illuminate\Bus\Dispatcher as BusDispatcher;

class App
{
    /**
	 * The command bus.
	 *
	 * @array $bus
	 */
	protected $bus;

	/**
	 * The setLocale.
	 */
	protected $setLocale;
	
	/**
	 * The setCountry.
	 */
    protected $setCountry;

    /**
	 * Create a new App instance.
	 *
	 * @param  Illuminate\Bus\Dispatcher $bus
	 * @param  App\Jobs\SetLocale $setLocale
	 * @param  App\Jobs\SetCountry $setCountry
	 * @return void
	*/
    public function __construct(BusDispatcher $bus,
                                SetLocale $setLocale, SetCountry $setCountry)
	{
		$this->bus = $bus;
		$this->setLocale = $setLocale;
		$this->setCountry = $setCountry;
	}
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->bus->dispatch($this->setLocale);
        $this->bus->dispatch($this->setCountry);
        
        return $next($request);
    }
}
