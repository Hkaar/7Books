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
        'isbn',
        'name',
        'desc',
        'price',
        'rate',
        'img',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array<int, string>
     */
    protected $with = ['genres', 'authors'];

    /**
     * Define the relationship with genres
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Genre>
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genres');
    }

    /**
     * Define the relationship with ratings
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<BookRating>
     */
    public function ratings()
    {
        return $this->hasMany(BookRating::class, 'book_id', 'id');
    }

    /**
     * Define the relationship with authors
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Author>
     */
    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_authors');
    }

    /**
     * Define the relationship with order items
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<OrderItem>
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'book_id', 'id');
    }

    /**
     * Define the relationship with libraries
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Library>
     */
    public function libraries()
    {
        return $this->belongsToMany(Library::class, 'library_books');
    }

    /**
     * Define the relationship with regions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Region>
     */
    public function regions()
    {
        return $this->belongsToMany(Region::class, 'region_books');
    }

    /**
     * Scope a query to only include a specific genre
     *
     * @param  \Illuminate\Database\Eloquent\Builder<Book>  $query
     * @return \Illuminate\Database\Eloquent\Builder<Book>
     */
    public function scopeByGenre(Builder $query, string $genre)
    {
        return $query->whereHas('genres', function (Builder $query) use ($genre) {
            $query->where('name', '=', $genre);
        });
    }

    /**
     * Scope a query to only include a specific author
     *
     * @param  \Illuminate\Database\Eloquent\Builder<Book>  $query
     * @return \Illuminate\Database\Eloquent\Builder<Book>
     */
    public function scopeByAuthor(Builder $query, string $author)
    {
        return $query->whereHas('authors', function (Builder $query) use ($author) {
            $query->where('name', '=', $author);
        });
    }

    /**
     * Scope a query to only include books that have been borrowed
     *
     * @param  \Illuminate\Database\Eloquent\Builder<Book>  $query
     * @return \Illuminate\Database\Eloquent\Builder<Book>
     */
    public function scopeOnlyBorrowed(Builder $query)
    {
        return $query->where('borrowed', '>', 0);
    }

    /**
     * Get the book rating
     */
    public function rating(): int|float
    {
        $totalScore = 0;

        $totalUsers = count($this->ratings);
        $maxScore = $totalUsers * 5;

        foreach ($this->ratings as $rating) {
            $totalScore += $rating->rating;
        }

        if ($maxScore > 0) {
            return ($totalScore / $maxScore) * 5;
        }

        return 0;
    }
}
