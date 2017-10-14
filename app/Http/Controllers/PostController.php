<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts'] = Post::all(); // TODO: add pagination

		return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Post::validationRulesNew);

		$user = \Auth::user();

		$post = new Post();
		
		$post->title 		= $request->title;
		$post->slug 		= Post::processSlug($request->slug);
		$post->content 		= Post::processContent($request->content);
		$post->author 		= $user->id;
		$post->language 	= $request->language;
		$post->save();

		return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data['post'] = $post;

		return view('posts.show', $data);
    }

	public function recent()
	{
		$data['posts'] = Post::where('language', \App::getLocale())->orderBy('created_at', 'desc')->paginate(3);

		return view('posts.recent', $data);
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data['post'] = $post;

		return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
         $this->validate($request, Post::validationRules);

		$user = \Auth::user();
		
		$post->title 		= $request->title;
		$post->slug 		= Post::processSlug($request->slug);
		$post->content 		= Post::processContent($request->content);
		$post->author 		= $user->id; // Do we want this?
		$post->language 	= $request->language;
		$post->save();

		return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

		return redirect('/admin/posts');
    }
}
