<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['sponsors'] = Media::getSponsors();

        return view('admin.sponsors.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sponsors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [
			'image' => 'required',
			'url' 	=> 'required|url',
			'alt' 	=> 'required',
		]);

		if($request->hasFile('image') && $request->file('image')->isValid()) {
			$sponsor['file'] = Media::processSponsor($request->file('image'));
		} else {
			// Redirect back or smth...
		}
		
		$sponsor['id'] 	= md5($sponsor['file']);
		$sponsor['alt'] = $request->get('alt');
		$sponsor['url'] = $request->get('url');

		$sponsor = json_encode($sponsor);

		Media::saveSponsor(json_decode($sponsor));

        return redirect('/admin/sponsors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
	 * @param $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit($sponsor)
    {
        $data['sponsor'] = Media::findSponsor($sponsor);

		return view('admin.sponsors.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sponsor)
    {
		$this->validate($request, [
			'url' => 'required|url',
			'alt' => 'required',
		]);

        $entry = Media::findSponsor($sponsor);

		if($request->hasFile('image') && $request->file('image')->isValid()) {
			$entry->file = Media::processSponsor($request->file('image'));
		}

		$entry->alt = $request->get('alt');
		$url = static::validateUrl($request->get('url'));
		if($url) {
			$entry->url = $url;
		}

		Media::saveSponsor($entry);

		return redirect('/admin/sponsors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy($sponsor)
    {
        $entry = Media::findSponsor($sponsor);
		
		Media::destroySponsor($entry);

		return redirect('/admin/sponsors');
    }

	private static function validateUrl($url)
	{
		if(substr($url, 0, 4) !== 'http') {
			$url = 'http://' . $url;
		}

		if(filter_var($url, FILTER_VALIDATE_URL) === false) {
			return false;
		}

		return $url;
	}
}
