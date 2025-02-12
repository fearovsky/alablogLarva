<?php

namespace Modules\Blog\Repositories;

use Modules\Blog\Entities\Article;
use Modules\Blog\Dto\ArticleStoreDto;
use Illuminate\Database\Eloquent\Collection;

class ArticleRepository
{
    public function getAll(): Collection
    {
        return Article::all();
    }

    public function create(ArticleStoreDto $articleStoreDto): Article
    {
        return Article::make($articleStoreDto->toArray());
    }

    public function delete(Article $article): void
    {
        $article->delete();
    }
}
