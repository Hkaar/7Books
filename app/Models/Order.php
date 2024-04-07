<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Define the relationship with order items
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class, "order_id", "id");
    }

    /**
     * Define the relationship with users
     */
    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
