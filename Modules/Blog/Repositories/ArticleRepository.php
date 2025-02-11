<?php

namespace Modules\Blog\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Blog\Entities\Article;

class ArticleRepository
{
    public function getAll(): Collection
    {
        return Article::all();
    }

    public function delete(Article $article): void
    {
        $article->delete();
    }
}
