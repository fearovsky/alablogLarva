<?php

namespace Modules\Blog\Repositories;

use Modules\Blog\Entities\Article;
use Modules\Blog\Dto\ArticleStoreDto;
use Modules\Blog\Dto\ArticleUpdateDto;
use Illuminate\Database\Eloquent\Collection;

class ArticleRepository
{
    public function getAll(): Collection
    {
        return Article::all();
    }

    public function create(ArticleStoreDto $articleStoreDto): Article
    {
        $article = Article::make(attributes: $articleStoreDto->toArray());
        $article->save();

        return $article;
    }

    public function update(ArticleUpdateDto $articleUpdateDto, Article $article): Article
    {
        $article->update($articleUpdateDto->toArrayOnlyNotNull());

        return $article->fresh();
    }

    public function delete(Article $article): void
    {
        $article->delete();
    }
}
