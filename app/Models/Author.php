<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\Vite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'authors';

    /**
     * The attributes that are mass assignable
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'address',
        'phone',
    ];

    /**
     * Define the relationship with books
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Book>
     */
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_authors');
    }

    /**
     * Scope a query by an author's name
     *
     * @param  \Illuminate\Database\Eloquent\Builder<Author>  $query
     * @return \Illuminate\Database\Eloquent\Builder<Author>
     */
    public function scopeByName(Builder $query, string $name)
    {
        return $query->where('name', 'like', "%{$name}%");
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('author_photo')->singleFile();
    }
    
    public function getPhotoAttribute()
    {
        return $this->getFirstMediaUrl('author_photo') ?: Vite::asset('resources/images/default-avatar.png');
    }
}
