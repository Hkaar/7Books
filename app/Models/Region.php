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
        'timezone',
    ];

    /**
     * Define the relationship with libraries
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Library>
     */
    public function libraries()
    {
        return $this->hasMany(Library::class, 'region_id', 'id');
    }

    /**
     * Define the relationship with books
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Book>
     */
    public function books()
    {
        return $this->belongsToMany(Book::class, 'region_books');
    }

    /**
     * Define the relationship with users
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<User>
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_regions');
    }
}
