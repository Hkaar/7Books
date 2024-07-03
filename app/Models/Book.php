<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        "isbn",
        "name",
        "desc",
        "price",
        "rate",
        "img"
    ];

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
        return $this->belongsToMany(Author::class, "book_authors");
    }

    /**
     * Define the relationship with order items
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class, "book_id", "id");
    }

    /**
     * Define the relationship with libraries
     */
    public function libraries()
    {
        return $this->belongsToMany(Library::class, "library_books");
    }

    /**
     * Define the relationship with regions
     */
    public function regions()
    {
        return $this->belongsToMany(Region::class, "region_books");
    }

    /**
     * Scope a query to only include a specific genre
     */
    public function scopeByGenre(Builder $query, string $genre) {
        return $query->whereHas("genres", function (Builder $query) use ($genre) {
            $query->where("name", "=", $genre);
        });
    }

    /**
     * Scope a query to only include a specific author
     */
    public function scopeByAuthor(Builder $query, string $author) {
        return $query->whereHas("authors", function (Builder $query) use ($author) {
            $query->where("name", "=", $author);
        });
    }

    /**
     * Scope a query to only include books that have been borrowed
     */
    public function scopeOnlyBorrowed(Builder $query) {
        return $query->where("borrowed", ">", 0);
    }
}
