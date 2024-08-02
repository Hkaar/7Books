<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

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
     */
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_authors');
    }
}
