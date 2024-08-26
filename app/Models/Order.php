<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'token',
        'created',
        'placed_date',
        'return_date',
        'status_id',
    ];

    /**
     * Define the relationship with order items
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<OrderItem>
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    /**
     * Define the relationship with users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, Order>
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Define relationship with statuses
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Status, Order>
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    /**
     * Scope a query to only include a specific order status
     *
     * @param  \Illuminate\Database\Eloquent\Builder<Order>  $query
     * @return \Illuminate\Database\Eloquent\Builder<Order>
     */
    public function scopeByStatus(Builder $query, string $status)
    {
        return $query->whereHas('status', function (Builder $query) use ($status) {
            $query->where('name', '=', $status);
        });
    }

    /**
     * Scope a query to only include orders that have been overdue
     *
     * @param  \Illuminate\Database\Eloquent\Builder<Order>  $query
     * @return \Illuminate\Database\Eloquent\Builder<Order>
     */
    public function scopeByOverdue(Builder $query)
    {
        return $query->where('return_date', '<', now());
    }

    /**
     * Scope a query ton only include orders that are due
     *
     * @param  \Illuminate\Database\Eloquent\Builder<Order>  $query
     * @return \Illuminate\Database\Eloquent\Builder<Order>
     */
    public function scopeByDue(Builder $query)
    {
        return $query->where('return_date', '>', now());
    }

    /**
     * Scope a query to only include a certain user
     *
     * @param  \Illuminate\Database\Eloquent\Builder<Order>  $query
     * @return \Illuminate\Database\Eloquent\Builder<Order>
     */
    public function scopeByUser(Builder $query, string $username)
    {
        return $query->whereHas('user', function (Builder $query) use ($username) {
            $query->where('username', 'like', '%' . $username . '%');
        });
    }
}
