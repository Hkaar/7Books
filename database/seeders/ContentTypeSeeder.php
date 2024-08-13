<?php

namespace Database\Seeders;

use App\Models\ContentType;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! ContentType::ByName('image')->first()) {
            ContentType::create([
                'name' => 'image',
            ]);
        }

        if (! ContentType::ByName('h1')->first()) {
            ContentType::create([
                'name' => 'h1',
            ]);
        }

        if (! ContentType::ByName('h2')->first()) {
            ContentType::create([
                'name' => 'h2',
            ]);
        }

        if (! ContentType::ByName('h3')->first()) {
            ContentType::create([
                'name' => 'h3',
            ]);
        }

        if (! ContentType::ByName('h4')->first()) {
            ContentType::create([
                'name' => 'h4',
            ]);
        }

        if (! ContentType::ByName('h5')->first()) {
            ContentType::create([
                'name' => 'h5',
            ]);
        }

        if (! ContentType::ByName('h6')->first()) {
            ContentType::create([
                'name' => 'h6',
            ]);
        }

        if (! ContentType::ByName('text_bold')->first()) {
            ContentType::create([
                'name' => 'text_bold',
            ]);
        }

        if (! ContentType::ByName('text_italic')->first()) {
            ContentType::create([
                'name' => 'text_italic',
            ]);
        }

        if (! ContentType::ByName('text')->first()) {
            ContentType::create([
                'name' => 'text',
            ]);
        }
    }
}
