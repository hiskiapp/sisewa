<?php

namespace Services;

use Intervention\Image\Facades\Image;
use File;

class FileService
{
	public function handleUploadedPhoto($image)
	{
		if (!is_null($image)) {
			$path = 'media/uploads/' . $this->checkGuard() . '/' . auth()->user()->id . '/';

			if (!file_exists(public_path($path))) {
				mkdir($path, 666, true);
			}

			$path .= time() . '.' . $image->getClientOriginalExtension();
			$file = Image::make($image);
			$file->save(public_path($path));

			return $path;
		}
    }

    public function handleUploadedFile($file)
	{
		if (!is_null($file)) {
			$path = 'media/uploads/' . $this->checkGuard() . '/' . auth()->user()->id . '/';

			if (!file_exists(public_path($path))) {
				mkdir($path, 666, true);
			}

			$name = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs($path, $name);

			return $path . $name;
		}
	}

	public function uploadImage($request, $path, $name='photo')
	{
		if ($request->hasFile($name)) {
			$this->delete($path);

			return $this->handleUploadedPhoto($request->file($name));
		}

		return $path;
    }

    public function uploadFile($request, $path, $name='file')
	{
		if ($request->hasFile($name)) {
			$this->delete($path);

			return $this->handleUploadedFile($request->file('file'));
		}

		return $path;
	}

	public function delete($path)
	{
		if ($path = 'images/users/avatar.png') {
			return false;
		}

		return File::delete($path);
	}

	private function checkGuard()
	{
		if (auth('admin')->check()) {
			return 'admin';
		}else{
			return 'user';
		}
	}
}
