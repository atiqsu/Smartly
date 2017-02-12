<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function deleteImage($imageName)
    {
        Storage::delete('public/'.$imageName);
    }

	/**
	 * @param      $url
	 * @param      $destination
	 * @param null $name
	 *
	 * @return string
	 */
	public function fetchImageFromUrl($url, $destination, $name = null):string
	{
		$extension = pathinfo($url, PATHINFO_EXTENSION);
		$filename = str_random(4) . '-' . str_slug($name) . '.' . $extension;
		$file = file_get_contents($url);
		file_put_contents(storage_path() . $destination . $filename, $file);
		return $filename;
	}
}
