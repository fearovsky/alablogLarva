<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Blog\Database\factories\ArticleFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
    ];

    protected static function newFactory()
    {
        return ArticleFactory::new();
    }
}
