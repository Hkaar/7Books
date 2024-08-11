<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Laravel\Facades\Image;

trait Uploader
{
    /**
     * Uploads an image to the disk
     */
    public function uploadImage(UploadedFile $file, array $options = [])
    {
        $folder = $options['folder'] ?? 'uploads';
        $disk = $options['disk'] ?? 'public';

        [$width, $height] = $options['size'] ?? [null, null];

        $name = $options['name'] ?? time() . '_' . $file->hashName() . $file->extension();
        $path = $file->storeAs($folder, $name, $disk);

        if ($width && $height) {
            $image = Image::read(public_path('storage/' . $path));
            $image->resize($width, $height, fn ($constraint) => $constraint->aspectRatio());

            $image->save(public_path('storage/' . $path));
        }

        return $path;
    }
}
