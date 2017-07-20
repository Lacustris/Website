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
}
