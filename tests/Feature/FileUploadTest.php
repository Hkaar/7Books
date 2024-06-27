<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Traits\Uploader;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUploadTest extends TestCase
{
    use Uploader;

    /**
     * Test whether the upload image works
     */
    public function test_upload_image(): void
    {
        Storage::fake("test");

        $file = UploadedFile::fake()->image("test_image.jpg");

        $path = $this->uploadImage($file, [
            "name" => "test_image.jpg",
            "size" => [200, 200],
            "disk" => "test",
        ]);
        
        $this->assertTrue(Storage::disk("test")->exists($path));
        Storage::disk('test')->delete($path);

    }
}
