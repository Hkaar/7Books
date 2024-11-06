<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'genres';

    /**
     * The attributes that are mass assignable
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Define the relationship with books
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Book>
     */
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_genres');
    }

    /**
     * Scope a query by an genre's name
     *
     * @param  \Illuminate\Database\Eloquent\Builder<Genre>  $query
     * @return \Illuminate\Database\Eloquent\Builder<Genre>
     */
    public function scopeByName(Builder $query, string $name)
    {
        return $query->where('name', 'like', "%{$name}%");
    }
}
