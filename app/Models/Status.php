<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'statuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Define the relationship with orders
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Order>
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'status_id', 'id');
    }

    /**
     * Scope a query by name
     *
     * @param  \Illuminate\Database\Eloquent\Builder<Status>  $query
     * @return \Illuminate\Database\Eloquent\Builder<Status>
     */
    public function scopeByName(Builder $query, string $name)
    {
        return $query->where('name', '=', $name);
    }
}
