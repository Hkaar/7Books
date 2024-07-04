<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'regions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'desc',
    ];

    /**
     * Define the relationship with libraries
     */
    public function libraries()
    {
        return $this->hasMany(Library::class, "region_id", "id");
    }

    /**
     * Define the relationship with books
     */
    public function books()
    {
        return $this->belongsToMany(Book::class, "region_books");
    }

    /**
     * Define relationship with order items
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class, "region_id", "id");
    }
}
