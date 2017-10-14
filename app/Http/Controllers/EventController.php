<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Event;

class EventController extends Controller
{
    public function calendar($month = false, $year = false)
	{
		$now 	= Carbon::now('Europe/Amsterdam');

		if($month === false) {
			$month = $now->month;
		}
		if($year === false) {
			$year = $now->year;
		}
		
		$prev['month'] 	= $month-1;
		$prev['year'] 	= $year;
		$next['month'] 	= $month+1;
		$next['year'] 	= $year;
		
		if($month == 1) {
			$prev['month'] = 12;
			$prev['year']--;
		} elseif($month == 12) {
			$next['month'] = 1;
			$next['year']++;
		}

		$data['weeks'] 		= Event::getCalArray($month, $year);
		$data['lastMonth']  = Event::getCalArray($prev['month'], $prev['year']);
		$data['lastMonth']  = end( $data['lastMonth'] );
		$data['nextMonth']  = Event::getCalArray($next['month'], $next['year']);
		$data['nextMonth']	= reset( $data['nextMonth'] );
		$data['previous'] 	= '/calendar/' . $prev['month'] . '/' . $prev['year'];
		$data['next'] 		= '/calendar/' . $next['month'] . '/' . $next['year'];
		$data['date'] 		= Event::getMonth($month) . ' ' . $year;

		return view('events.calendar', $data);
	}

	public function show(Event $event)
	{
		$data['event'] = $event;
		
		return view('events.show', $data);
	}

	public function index(Event $event)
	{
		$data['events'] = Event::orderBy('start_time', 'desc')->get();

		return view('admin.events.index', $data);
	}

	public function create()
	{	
		$data['now'] = Carbon::now('Europe/Amsterdam');

		return view('admin.events.create', $data);
	}

	public function store(Request $request)
	{
		$this->validate($request, Event::validationRules);

		$event = new Event();

		$event->name 		= $request->name;
		$event->description = $request->description;
		$event->start_time	= $request->start_time;
		$event->end_time	= $request->end_time;
		$event->save();

		return redirect('/admin/events');
	}

	public function edit(Event $event)
	{
		$data['event'] = $event;

		return view('admin.events.edit', $data);
	}

	public function update(Request $request, Event $event)
	{
		// Validate
		$this->validate($request, Event::validationRules);

		// Save
		$event->name 		= $request->name;
		$event->description = $request->description;
		$event->start_time	= $request->start_time;
		$event->end_time	= $request->end_time;
		$event->save();

		// Redirect
		return redirect('/admin/events');
	}

	public function destroy(Event $event)
	{
		$event->delete();

		return redirect('/admin/events');
	}
}
