<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Laravel\Facades\Image;

trait Uploader
{
    /**
     * Uploads an image to the disk
     */
    public function uploadImage(UploadedFile $file, string $name = null, array $size = [])
    {
        $name = $name ?? time(). '_' . $file->getClientOriginalName();
        $path = $file->storeAs("uploads", $name, "public");

        $image = Image::read(public_path("storage/" . $path));
        $image->resize($size[0], $size[1], fn($constraint) => $constraint->aspectRatio());

        $image->save(public_path("storage/" . $path));

        return $path;
    }
}