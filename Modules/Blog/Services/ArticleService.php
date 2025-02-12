<?php

namespace Modules\Blog\Services;

use Shared\Services\CacheService;
use Modules\Blog\Entities\Article;
use Modules\Blog\Dto\ArticleStoreDto;
use Modules\Blog\Dto\ArticleUpdateDto;
use Illuminate\Database\Eloquent\Collection;
use Modules\Blog\Repositories\ArticleRepository;

class ArticleService
{
    const CACHE_KEY = 'articles';

    public function __construct(
        private ArticleRepository $articleRepository,
        private CacheService $cacheService
    ) {
    }

    public function getAll(): Collection
    {
        $cached = $this->cacheService->get(self::CACHE_KEY);
        if ($cached) {
            return $cached;
        }

        $articles = $this->articleRepository->getAll();

        $this->cacheService->put(self::CACHE_KEY, $articles, 3600);

        return $articles;
    }

    public function create(ArticleStoreDto $articleStoreDto): Article
    {
        $this->cacheService->forget(self::CACHE_KEY);
        return $this->articleRepository->create($articleStoreDto);
    }

    public function update(ArticleUpdateDto $articleUpdateDto, Article $article): Article
    {
        $this->cacheService->forget(self::CACHE_KEY);
        $this->articleRepository->update($articleUpdateDto, $article);

        return $this->articleRepository->refresh($article);
    }

    public function delete(Article $article): void
    {
        $this->cacheService->forget(self::CACHE_KEY);
        $this->articleRepository->delete($article);
    }
}
