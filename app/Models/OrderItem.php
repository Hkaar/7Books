<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_items';

    /**
     * The attributes that are mass assignable
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'book_id',
        'amount',
        'library_id',
    ];

    /**
     * Define the relationship with orders
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Order, OrderItem>
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    /**
     * Define the relationship with books
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Book, OrderItem>
     */
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    /**
     * Define relationship with libraries
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Library, OrderItem>
     */
    public function library()
    {
        return $this->belongsTo(Library::class, 'library_id', 'id');
    }
}
