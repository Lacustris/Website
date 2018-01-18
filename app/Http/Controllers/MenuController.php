<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;

class MenuController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth', 'permissions:8']); // Minimum position: board member
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = Menu::getMain();
		
		return view('admin.menu.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data['menu'] 	= Menu::getMain();
		$data['pages'] 	= Page::all();

        return view('admin.menu.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, Menu::validationRules);
		
		$parent = $request->parent;
		$parent_id = ($parent == 'root') ? null : $parent;
		$order = Menu::availableOrder($parent_id);
		if($request->type == 'page') {
			$target = 'dynamic:'.$request->page;
		} elseif($request->type == 'calendar') {
			$target = 'calendar';
		} elseif($request->type == 'competitions') {
			$target = 'competitions';
		} elseif($request->type == 'link') {
			$link = $request->link;
			if(substr($link, 0, 4) != 'http') {
				$link = 'http://' . $link;
			}
			
			$target = 'link:' . $link;
		} else {
			$target = '#';
		}
		

		Menu::create([
			'name_nl' 	=> $request->name_nl,
			'name_en' 	=> $request->name_en,
			'parent_id' => $parent_id,
			'order' 	=> $order,
			'target'	=> $target
		]);
		
		return redirect('/admin/menu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $data['item'] 	= $menu;
		$data['menu'] 	= Menu::getMain();
		$data['pages'] 	= Page::all();

		return view('admin.menu.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $this->validate($request, Menu::validationRules);

		$parent 	= $request->parent;
		$parent_id 	= ($parent == 'root') ? null : $parent;
		$order 		= $menu->updateOrder($parent_id);
		if($request->type == 'page') {
			$target = 'dynamic:'.$request->page;
		} elseif($request->type == 'calendar') {
			$target = 'calendar';
		} elseif($request->type == 'competitions') {
			$target = 'competitions';
		} elseif($request->type == 'link') {
			$link = $request->link;
			if(substr($link, 0, 4) != 'http') {
				$link = 'http://' . $link;
			}

			$target = 'link:' . $link;
		} else {
			$target = '#';
		}

		$menu->name_nl 		= $request->name_nl;
		$menu->name_en 		= $request->name_en;
		$menu->parent_id 	= $parent_id;
		$menu->order 		= $order;
		$menu->target 		= $target;
		$menu->save();

		return redirect('/admin/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

		return redirect('/admin/menu');
    }
}
