<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Define the relationship with orders
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Order>
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    /**
     * Define the relationship with book ratings
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<BookRating>
     */
    public function ratings()
    {
        return $this->hasMany(BookRating::class, 'user_id', 'id');
    }

    /**
     * Define the relationship with roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Role, User>
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    /**
     * Check if the user has a role that is privileged
     */
    public function isPrivileged(bool $strict = false): bool
    {
        if ($strict) {
            return $this->role->name === 'admin';
        }

        return in_array($this->role->name, ['admin', 'operator']);
    }

    /**
     * Scope a query to only include a specific permission level
     *
     * @param  \Illuminate\Database\Eloquent\Builder<User>  $query
     * @return \Illuminate\Database\Eloquent\Builder<User>
     */
    public function scopeByPermission(Builder $query, string $permission)
    {
        return $query->whereHas('role', function ($roleQuery) use ($permission) {
            $roleQuery->where('name', '=', $permission);
        });
    }
}
