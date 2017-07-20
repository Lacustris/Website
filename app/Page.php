<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends TextModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'name_nl', 'name_en', 'content_nl', 'content_en',
    ];

	const validationRulesNew = [
		'title_nl'		=> 'required|unique:pages|max:255',
		'title_en'		=> 'required|unique:pages|max:255',
		'slug'			=> 'required|unique:pages|max:100',
		'content_nl'	=> 'required',
		'content_en'	=> 'required',
	];

	const validationRules = [
		'title_nl'		=> 'required|max:255',
		'title_en'		=> 'required|max:255',
		'slug'			=> 'required|max:100',
		'content_nl'	=> 'required',
		'content_en'	=> 'required',
	];
	
	public function title() // TODO: Localise!
	{
		return $this->title_nl;
	}

	public function contents() // TODO: Localise!
	{
		return $this->contents_nl;
	}

	public static function processContent($content)
	{
		return $content;
	}
}
