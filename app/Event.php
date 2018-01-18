<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
	const validationRules = [
		'name' 			=> 'required|max:255',
		'description' 	=> 'required',
		'start_time' 	=> 'required|date|after:today',
		'end_time' 		=> 'required|date|after_or_equal:start_time',
	];

	public function competition()
	{
		return $this->hasOne('App\Competition', 'event_id');
	}

    public static function upcoming($number)
	{
		return static::whereDate('start_time', '>=', Carbon::today('Europe/Amsterdam')->toDateString())->orderBy('start_time', 'asc')->take($number)->get();
	}

	public static function getPerMonth($month, $year)
	{
		return static::whereYear('start_time', $year)->whereMonth('start_time', $month)->orderBy('start_time', 'asc')->get();
	}

	public static function getCalArray($month, $year)
	{
		$first 	= Carbon::createFromDate($year, $month, 1, 'Europe/Amsterdam');

		$firstDay 	= $first->dayOfWeek;
		$days 		= $first->daysInMonth;

		$events 	= static::getPerMonth($month, $year);
		$eventList 	= [];

		foreach($events as $event) {
			if(!isset($eventList[$event->day()])) {
				$eventList[$event->day()] = [];
			}
			array_push($eventList[$event->day()], $event);
		}

		$weeks = [];
		$weekNo = $first->weekOfYear;
		$totalDays = $days + $firstDay + 1;
		for($i = 1; $i < $totalDays; $i++) {
			if($i <= $firstDay || $i > ($days + $firstDay)) {
				$weeks[$weekNo][$i - $firstDay] = false;
			} else {
				$weeks[$weekNo][$i - $firstDay] = isset($eventList[$i - $firstDay]) ? $eventList[$i - $firstDay] : true;
			}

			if($i % 7 == 0) {
				$weekNo++;
			}
		}

		return $weeks;
	}

	public function startDate($year = false)
	{
		return $this->formatDate($this->start_time, $year);
	}
	
	public function endDate()
	{
		return $this->formatDate($this->end_time);
	}

	private static function formatDate($time, $year = false)
	{
		$timestamp = Carbon::parse($time);
		$day = $timestamp->day;
		$month = static::getMonth($timestamp->month);
		if($year) {
			$year = $timestamp->year;
			return $day . ' ' . $month . ' ' . $year;
		}
		return $day . ' ' . $month;
	}

	public function startTime()
	{
		return $this->formatTime($this->start_time);
	}

	public function endTime()
	{
		return $this->formatTime($this->end_time);
	}

	private static function formatTime($time)
	{
		$timestamp = Carbon::parse($time);

		return $timestamp->format('H:m');
	}

	private function day()
	{
		return Carbon::parse($this->start_time)->day;
	}

	public static function getMonth($month)
	{
		switch($month) {
			case  1: return __('events.january');
			case  2: return __('events.february');
			case  3: return __('events.march');
			case  4: return __('events.april');
			case  5: return __('events.may');
			case  6: return __('events.june');
			case  7: return __('events.july');
			case  8: return __('events.august');
			case  9: return __('events.september');
			case 10: return __('events.october');
			case 11: return __('events.november');
			case 12: return __('events.december');
			default:
				return $month;
		}
	}
}
