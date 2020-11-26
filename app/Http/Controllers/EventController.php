<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Event;
use App\Participant;

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
		$data['events'] = 	Event::whereDate('start_time', '>=', Carbon::today()->toDateString())
							->orderBy('start_time', 'asc')
							->get();

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

		$event->name 			= $request->name;
		$event->name_en 		= $request->name_en;
		$event->description 	= $request->description;
		$event->description_en 	= $request->description_en;
		$event->start_time		= $request->start_time;
		$event->end_time		= $request->end_time;
		$event->registerable 	= isset($request->registerable);
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
		$event->name 			= $request->name;
		$event->name_en 		= $request->name_en;
		$event->description 	= $request->description;
		$event->description_en	= $request->description_en;
		$event->start_time		= $request->start_time;
		$event->end_time		= $request->end_time;
		$event->registerable 	= isset($request->registerable);
		$event->save();

		// Redirect
		return redirect('/admin/events')->with('notification', [
			'type' => 'success',
			'body' => __( 'admin.saveSuccessful' ),
		]);
	}

	public function destroy(Event $event)
	{
		$event->delete();

		return redirect('/admin/events');
	}

	public function join(Event $event)
	{
		// Can't (de)register for past events
		if(Carbon::now()->diffInSeconds(Carbon::parse($event->start_time), false) < 0) {
			return redirect('/event/' . $event->id)->with('notification', [
				'type' => 'error',
				'body' => __( 'events.pastEventError' ),
			]);
		}

		// Can't Register for events that are not registerable
		if(!$event->registerable) {
			return redirect('/event/' . $event->id)->with('notification', [
				'type' => 'error',
				'body' => __( 'events.notRegisterableError' ),
			]);
		}

		// Check whether the user should be registered or deregistered.
		if($event->me()) {
			// Stop participating
			$participant = Participant::where('event_id', $event->id)->where('user_id', \Auth::user()->id)->first();
			$participant->delete();

			return redirect('/event/' . $event->id)->with('notification', [
				'type' => 'success',
				'body' => __( 'events.participateStopSuccessful' ),
			]);
		} else {
			// Participate
			$participant = new Participant();
			$participant->user_id = \Auth::user()->id;
			$participant->event_id = $event->id;
			$participant->save();

			return redirect('/event/' . $event->id)->with('notification', [
				'type' => 'success',
				'body' => __( 'events.participateSuccessful' ),
			]);
		}

		// There maybe should be a catch-all case here, but what... Maybe a generic error message?
	}

	public function participants(Event $event)
	{
		$data['title'] 			= __('events.participantsList');
		$data['participants'] 	= [];

		foreach($event->participants as $participant) {
			$data['participants'][] = $participant->user->name;
		}
		
		return response()->json($data, 200);
	}
}
