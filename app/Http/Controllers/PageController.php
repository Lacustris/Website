<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Menu;

class PageController extends Controller
{
	/**
	 * Setup permissions for the controller. Minimum required permission is board member,
	 * except for the show() method, as it is public
	 */
	public function __construct()
	{
		$this->middleware(['auth', 'permissions:8'], ['except' => 'show']);
	}

    public function show(Page $page)
	{
		if( !isset($page) ) {
			return redirect('/'); // TODO: create 404 page
		}

		$data['page'] = $page;

		return view('page', $data);
	}

	public function index()
	{
		$data['pages'] = Page::all(); // TODO: add pagination

		return view('admin.pages.index', $data);
	}

	public function create()
	{
		return view('admin.pages.create');
	}

	public function edit(Page $page)
	{
		$data['page'] = $page;

		return view('admin.pages.edit', $data);
	}

	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function store(Request $request)
	{
		$this->validate($request, Page::validationRulesNew);

		$page = new Page();
		
		$page->title_nl 	= $request->title_nl;
		$page->title_en 	= $request->title_en;
		$page->slug 		= Page::processSlug($request->slug);
		$page->contents_nl 	= Page::processContent($request->content_nl);
		$page->contents_en 	= Page::processContent($request->content_en);
		$page->save();

		return redirect('/admin/pages');
	}

	/**
     * Update an existing resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
	public function update(Request $request, Page $page)
	{
		$this->validate($request, Page::validationRules);

		$page->title_nl 	= $request->title_nl;
		$page->title_en 	= $request->title_en;
		$page->slug 		= Page::processSlug($request->slug);
		$page->contents_nl 	= Page::processContent($request->content_nl);
		$page->contents_en 	= Page::processContent($request->content_en);
		$page->save();

		return redirect('/admin/pages');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
		// Delete all associated menus
        $target = 	'dynamic:' . $page->slug;
		$menus = 	Menu::where('target', $target)->get();

		foreach($menus as $menu) {
			$menu->delete();
		}

		// Delete the page
		$page->delete();

		return redirect('/admin/pages');
    }
}
