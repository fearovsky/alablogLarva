<?php

namespace Modules\Blog\Services;

use Modules\Blog\Entities\Article;
use Modules\Blog\Dto\ArticleStoreDto;
use Illuminate\Database\Eloquent\Collection;
use Modules\Blog\Repositories\ArticleRepository;

class ArticleService
{
    public function __construct(
        private ArticleRepository $articleRepository
    ) {
    }

    public function getAll(): Collection
    {
        return $this->articleRepository->getAll();
    }

    public function create(ArticleStoreDto $articleStoreDto): Article
    {
        return $this->articleRepository->create($articleStoreDto);
    }

    public function delete(Article $article): void
    {
        $this->articleRepository->delete($article);
    }
}
