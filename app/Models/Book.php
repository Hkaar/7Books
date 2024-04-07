<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Define the relationship with genres
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class, "book_genres");
    }

    /**
     * Define the relationship with ratings
     */
    public function ratings()
    {
        return $this->hasMany(BookRating::class, "book_id", "id");
    }

    /**
     * Define the relationship with authors
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class, "book_author");
    }
}
