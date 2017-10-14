<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Media;

class MediaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth'); // TODO: Make it admin only or something... Maybe not due to the sponsors and stuff
    }

    public function index()
    {
		$page = \Request::get('page') - 1;

		$result = Media::getIndex($page);

		return response()->json($result);
    }

	public function upload(Request $request) // TODO: abstract this all away?
	{
		$response['type'] 		= 'success';
		$response['message'] 	= 'no issues yet';

		if(!$request->hasFile('image')) {
			$response['type'] 		= 'error';
			$response['message'] 	= 'no file in request';
		} elseif(!$request->file('image')->isValid()) {
			$response['type'] 		= 'error';
			$response['message'] 	= 'This file is invalid!';
		} else {
			$file 		= $request->file('image');

			$response['path'] = Media::process($file);
		}

		return response()->json($response);
	}

	public function pagination()
	{
		$data['page'] 	= \Request::get('page');
		$data['pages'] 	= \Request::get('pages');
		
		return view()->make('layouts.partials.pagination', $data);
	}

	public function test()
	{
		return response()->json(Media::findSponsor('8a1b3f466b6769b818c96b243212b898'));
	}

	public function sponsors()
	{
		return response()->json(Media::getSponsors());
	}
}
