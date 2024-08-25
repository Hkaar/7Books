<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryBook extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'library_id',
        'book_id',
        'stock',
    ];

    /**
     * Define the relationship with libraries
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Library, LibraryBook>
     */
    public function library()
    {
        return $this->belongsTo(Library::class, 'library_id', 'id');
    }

    /**
     * Define relationship with books
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Book, LibraryBook>
     */
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
