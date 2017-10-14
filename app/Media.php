<?php

namespace App;

use Illuminate\Support\Facades\Storage;

class Media
{
	public static function getIndex($index = 0) // THIS IS INEFFICIENT!! THIS SHOULD SIMPLY BE STORED IN A SINGLE FILE THAT CAN BE READ!
	{
		$files = Storage::files();

		$images = [];

		foreach($files as $file) {
			if(substr(Storage::mimeType($file), 0, 5) == "image") { // Only add images to the resulting array
				$images[] = $file;
			}
		}

		$result['pages'] 	= ceil(count($images) / 5);
		$result['images'] 	= array_slice(array_reverse($images), $index*5, 5);

		return $result;
	}

	public static function process($file)
	{
		$extension 	= $file->extension();
		$fileName 	= 'upload-' . date('U') . '.' . $extension;

		$image = \Image::make($file);
		$image->resize(500, null, function($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		});
		$file = $image->stream();

		Storage::put($fileName, $file);

		$path = '/storage/' . $fileName;

		return $path;
	}

	public static function getSponsors()
	{
		if(!Storage::exists('/sponsors/sponsors.json')) {
			$images = [];

			$files = Storage::files('/sponsors'); // This is similar to getIndex...
			foreach($files as $file) {
				if(substr(Storage::mimeType($file), 0, 5) == "image") { // Only add images to the resulting array
					$entry['file'] 	= $file;
					$entry['id'] 	= md5($file);
					$entry['url'] 	= '';
					$entry['alt'] 	= '';
					$images[] 		= $entry;
				}
			}

			Storage::put('/sponsors/sponsors.json', json_encode($images));
		}
		
		$sponsors = Storage::get('/sponsors/sponsors.json');

		return json_decode($sponsors);
	}

	public static function findSponsor($target)
	{
		if(!Storage::exists('/sponsors/sponsors.json')) {
			return false;
		}

		$sponsors = json_decode(Storage::get('/sponsors/sponsors.json'));

		foreach($sponsors as $sponsor) {
			if($sponsor->id == $target) {
				return $sponsor;
			}
		}

		return false;
	}

	public static function saveSponsor($item)
	{
		$sponsors = static::getSponsors();

		foreach($sponsors as $sponsor) {
			if($sponsor->id == $item->id) {
				$sponsor->file 	= $item->file;
				$sponsor->url 	= $item->url;
				$sponsor->alt 	= $item->alt;
				Storage::put('/sponsors/sponsors.json', json_encode($sponsors));
				return true;
			}
		}

		array_push($sponsors, $item);
		Storage::put('/sponsors/sponsors.json', json_encode($sponsors));
		return true;
	}

	public static function destroySponsor($item)
	{
		$sponsors = static::getSponsors();
		$result = [];

		foreach($sponsors as $sponsor) {
			if($sponsor->id != $item->id) {
				array_push($result, $sponsor);
			}
		}

		Storage::put('/sponsors/sponsors.json', json_encode($result));
		return true;
	}

	public static function processSponsor($image)
	{
		$result = \Image::make($image);
		$result->resize(150, null, function($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		});
		$result = $result->stream();

		$fileName = 'sponsors/u' . date('U') . '.' . $image->extension();

		Storage::put($fileName, $result);

		return $fileName;
	}
}
