<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'libraries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'desc',
        'region_id',
    ];

    /**
     * Define the relationship with regions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Region, Library>
     */
    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    /**
     * Define the relationship with books
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Book>
     */
    public function books()
    {
        return $this->belongsToMany(Book::class, 'library_books');
    }
}
