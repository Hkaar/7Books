<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Define the relationship with users
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<User>
     */
    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }

    /**
     * Scope a query by role name
     *
     * @param  \Illuminate\Database\Eloquent\Builder<Role>  $query
     * @return \Illuminate\Database\Eloquent\Builder<Role>
     */
    public function scopeByName(Builder $query, string $name)
    {
        return $query->where('name', '=', $name);
    }
}
