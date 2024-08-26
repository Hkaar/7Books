<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleContent extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'article_contents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'article_id',
        'content',
        'content_type_id',
        'order',
    ];

    /**
     * Define relationship with articles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Article, ArticleContent>
     */
    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }

    /**
     * Define relationship with content types
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<ContentType, ArticleContent>
     */
    public function contentType()
    {
        return $this->belongsTo(ContentType::class, 'content_type_id', 'id');
    }
}
