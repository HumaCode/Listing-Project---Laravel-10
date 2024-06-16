<?php

namespace App\Traits;

use File;
use Illuminate\Http\Request;

trait FileUploadTrait
{
    function uploadImage(Request $request, $inputName, $oldPath = null, $path = '/uploads')
    {
        if ($request->hasFile($inputName)) {
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;
            $image->move(public_path($path), $imageName);

            // delete image
            $exculudedFolder = '/default';
            if ($oldPath && File::exists(public_path($oldPath)) && strpos($oldPath, $exculudedFolder) !== 0) {
                File::delete(public_path($oldPath));
            }

            return $path . '/' . $imageName;
        }

        return null;
    }

    function uploadMultipleImage(Request $request, $inputName, $path = '/uploads')
    {
        if ($request->hasFile($inputName)) {
            $images = $request->{$inputName};

            $paths = [];

            foreach ($images as $image) {
                $ext = $image->getClientOriginalExtension();
                $imageName = 'media_' . uniqid() . '.' . $ext;
                $image->move(public_path($path), $imageName);

                $paths[] = $path . '/' . $imageName;
            }

            return $paths;
        }

        return null;
    }

    function deleteFile($path)
    {
        // delete image
        $exculudedFolder = '/default';

        if ($path && File::exists(public_path($path)) && strpos($path, $exculudedFolder) !== 0) {
            File::delete(public_path($path));
        }
    }
}
