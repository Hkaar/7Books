<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'content_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Define relationship with article contents
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<ArticleContent>
     */
    public function articleContents()
    {
        return $this->hasMany(ArticleContent::class, 'content_type_id', 'id');
    }

    /**
     * Scope a query by a name
     *
     * @param  \Illuminate\Database\Eloquent\Builder<ContentType>  $query
     * @return \Illuminate\Database\Eloquent\Builder<ContentType>
     */
    public function scopeByName(Builder $query, string $name)
    {
        return $query->where('name', '=', $name);
    }
}
