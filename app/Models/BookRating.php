<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRating extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "rating"
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Define the relationship with the user
     */
    public function user() {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    /**
     * Define the relationship with the book
     */
    public function book() {
        return $this->belongsTo(Book::class, "book_id", "id");
    }
}
