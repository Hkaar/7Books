<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'user_id',
        'public',
    ];

    /**
     * Define relationship with users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, Article>
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Define relationship with article contents
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<ArticleContent>
     */
    public function articleContents()
    {
        return $this->hasMany(ArticleContent::class, 'article_id', 'id');
    }

    /**
     * Scope a query by a user's id
     *
     * @param  \Illuminate\Database\Eloquent\Builder<Article>  $query
     * @return \Illuminate\Database\Eloquent\Builder<Article>
     */
    public function scopeByUser(Builder $query, int $userId)
    {
        return $query->where('user_id', '=', $userId);
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')->singleFile();
    }
}
