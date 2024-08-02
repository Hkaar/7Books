<?php

namespace Tests\Feature;

use App\Traits\Uploader;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileUploadTest extends TestCase
{
    use Uploader;

    /**
     * Test whether the upload image works
     *
     * @test
     */
    public function upload_image(): void
    {
        Storage::fake('test');

        $file = UploadedFile::fake()->image('test_image.jpg', 300, 300);

        $path = $this->uploadImage($file, [
            'name' => 'test_image.jpg',
            'disk' => 'test',
        ]);

        $this->assertTrue(Storage::disk('test')->exists($path));
        Storage::disk('test')->delete($path);

    }
}
