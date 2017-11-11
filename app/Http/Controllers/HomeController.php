<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\JoinEmail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth', [ 'except' => 'home,join' ] );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
      return view('welcome');
	}
	
	public function join()
	{
		return view('join');
	}

	public function doJoin(Request $request)
	{
		$info = $request->all();
		unset($info['_token']);

		Mail::to('secretaris@lacustris.nl')->send(new JoinEmail($info));

		return redirect('/');
	}
}
