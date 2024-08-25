<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegionBook extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'region_id',
        'book_id',
        'stock',
    ];

    /**
     * Define relationship with regions
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Region, RegionBook>
     */
    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    /**
     * Define relationship with books
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Book, RegionBook>
     */
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
