<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRegion extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'region_id',
    ];

    /**
     * Define relationship with users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, UserRegion>
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Define relationship with regions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Region, UserRegion>
     */
    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }
}
