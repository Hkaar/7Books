<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookRating;
use App\Models\Genre;
use App\Models\Library;
use App\Models\Region;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::factory()
            ->count(20)
            ->has(Genre::factory()->count(2), 'genres')
            ->has(Author::factory()->count(2), 'authors')
            ->has(BookRating::factory()->count(2), 'ratings')
            ->has(Library::factory()->count(1), 'libraries')
            ->has(Region::factory()->count(1), 'regions')
            ->create();
    }
}
