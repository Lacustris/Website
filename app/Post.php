<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends TextModel
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'title', 'author', 'content', 'language',
    ];

	const validationRulesNew = [
		'title'			=> 'required|unique:posts|max:255',
		'slug'			=> 'required|unique:posts|max:100',
		'content'		=> 'required',
	];

	const validationRules = [
		'title'			=> 'required|max:255',
		'slug'			=> 'required|max:100',
		'content'		=> 'required',
	];

	public function publishDate()
	{
		//strTo
		return $this->created_at->format('d-m-Y, h:m');
	}

	public function age()
	{
		Carbon::setlocale(\App::getLocale());
		return $this->created_at->diffForHumans();
	}
}
