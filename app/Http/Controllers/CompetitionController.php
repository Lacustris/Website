<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['competitions'] = Competition::getCompetitions();

		return view('admin.competitions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data['now'] = Carbon::now('Europe/Amsterdam');

        return view('admin.competitions.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, Event::validationRules);
		$this->validate($request, Competition::validationRules);
		
		$event = new Event();

		$event->name 			= $request->name;
		$event->name_en 		= $request->name_en;
		$event->description 	= $request->description;
		$event->description_en 	= $request->description_en;
		$event->start_time		= $request->start_time;
		$event->end_time		= $request->end_time;
		$event->save();

		$competition = new Competition();

		$competition->event_id 		= $event->id;
		$competition->location 		= $request->location;
		$competition->organisation	= $request->organisation;
		$competition->link			= $request->link;
		$competition->save();

		return redirect('/admin/competitions');
	}
	
	public function competitionIndex()
	{
		$data['competitions'] = Competition::getCompetitions();

		return view('competitions.index', $data);
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function show(Competition $competition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function edit(Competition $competition)
    {
		$data['competition'] = $competition;
		$data['now'] = Carbon::now('Europe/Amsterdam');
		
		return view('admin.competitions.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competition $competition)
    {
        $this->validate($request, Event::validationRules);
		$this->validate($request, Competition::validationRules);
		
		$event = $competition->event;

		$event->name 			= $request->name;
		$event->name_en 		= $request->name_en;
		$event->description 	= $request->description;
		$event->description_en 	= $request->description_en;
		$event->start_time		= $request->start_time;
		$event->end_time		= $request->end_time;
		$event->save();

		$competition->location 		= $request->location;
		$competition->organisation	= $request->organisation;
		$competition->link			= $request->link;
		$competition->save();

		return redirect('/admin/competitions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Competition  $competition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competition $competition)
    {
		$event = Event::find($competition->event_id);
		
		// Delete the competition
		$competition->delete();

		// Delete the associated event
		$event->delete();

		return redirect('/admin/competitions');
    }
}
