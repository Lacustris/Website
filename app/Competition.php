<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Event;

class Competition extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id', 'location', 'organisation', 'link'
    ];

	/**
	 * The rules that are required for storing an entry in the database
	 * 
	 * @var array
	 */
	const validationRules = [
		'location' 			=> 'required|max:255',
		'organisation' 		=> 'required|max:255',
		'link'				=> 'required|max:255',
	];	

	public function event()
	{
		return $this->belongsTo('App\Event');
	}

	public function start_time()
	{
		return $this->event->start_time;
	}

	public function link()
	{
		if(substr($this->link, 0, 4) == 'http') {
			return '<a href="' . $this->link . '">Hier</a>';
		}

		if(substr($this->link, 0, 3) == 'www') {
			return '<a href="http://' . $this->link . '">Hier</a>';
		}

		return $this->link;
	}

	public static function getCompetitions()
	{
		// Retrieve all competitions
		$competitionsQ = static::all();
		$competitions = [];

		// Filter for only future competitions
		foreach($competitionsQ as $item) {
			if( $item->start_time() >= Carbon::today()->toDateString() ) {
				$competitions[] = $item;
			}
		}

		// Sort them by date
		usort($competitions, function($a, $b)
		{
			$a->event->start_time <= $b->event->start_time ? -1 : 1;
		});

		return $competitions;
	}
}
 