<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextModel extends Model
{
    /**
	* Allows for route model binding using the slug instead of the Id
	* 
	* @return string
	*/
	public function getRouteKeyName()
	{
		return 'slug';
	}

	public static function processSlug($slug)
	{
		$slug = strtolower($slug);
		$slug = str_replace(' ', '_', $slug);

		return $slug;
	}

	public static function processContent($content)
	{
		return $content;
	}

	/**
	* Returns a preview of the content. Defaults to 50 characters and Dutch.
	* TODO: Maybe look into a nicer/pretier way of doing this? This seems hacky
	*
	* @param $content String
	* @param $length int
	* @return string
	*/
	public function preview($content, $length = 50)
	{
		$preview = $this->{$content}; // Get contents
		$preview = strip_tags($preview, '<br>'); // Strip all HTML except br
		$preview = preg_replace('/(\<br(\s*)(\/?)\>)/i', "\n", $preview); // Replace <br> (all forms) with newlines. This is done to prevent borked html
		$preview = substr($preview, 0, $length); // Take substring
		$preview = nl2br($preview, false); // Reinsert <br> tags for all newlines, to ensure proper rendering.

		return $preview;
	}
}
