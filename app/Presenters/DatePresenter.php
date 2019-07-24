<?php 

namespace App\Presenters;

use Carbon\Carbon;

trait DatePresenter
{
	public function getCreatedAtAttribute($date)
	{
		return $this->getDateFormated($date);
	}

	public function getUpdateAtAttribute($date)
	{
		return $this->getDateFormated($date);
	}

	
	public function getLastActivityAttribute($date)
	{
		return $this->getDateFormatedWithHours($date);
	}
	

	private function getDateFormated($date)
	{
		return Carbon::parse($date)->format(config('app.locale') == 'fr' ? 'd M Y' : 'M d, Y');
	}

	private function getDateFormatedWithHours($date)
	{
		return Carbon::parse($date)->format(config('app.locale') == 'fr' ? 'd-m-Y H:i:s' : 'm-d-Y H:i:s');
	}
}