<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        "user_id",
        "token",
        "created",
        "return_date",
        "status"
    ];

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

    /**
     * Scope a query to only include a specific order status
     */
    public function scopeByStatus(Builder $query, string $status) {
        return $query->where("status", "=", $status);
    }

    /**
     * Scope a query to only include orders that have been overdue
     */
    public function scopeByOverdue(Builder $query) {
        return $query->where("return_date", "<", now());
    }

    /**
     * Scope a query ton only include orders that are due
     */
    public function scopeByDue(Builder $query) {
        return $query->where("return_date", ">", now());
    }

    /**
     * Scope a query to only include a certain user
     */
    public function scopeByUser(Builder $query, string $username) {
        return $query->whereHas("user", function (Builder $query) use ($username) {
            $query->where("username", "like", "%".$username."%");
        });
    }
}
