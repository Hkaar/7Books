<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'authors';

    /**
     * The attributes that are mass assignable
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
        'phone',
        'img',
    ];

    /**
     * Define the relationship with books
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Book>
     */
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_authors');
    }

    /**
     * Scope a query by an author's name
     *
     * @param  \Illuminate\Database\Eloquent\Builder<Author>  $query
     * @return \Illuminate\Database\Eloquent\Builder<Author>
     */
    public function scopeByName(Builder $query, string $name)
    {
        return $query->where('name', 'like', "%{$name}%");
    }
}
