<?php

namespace Modules\Blog\Dto;

final readonly class ArticleStoreDto
{
    public function __construct(
        public string $title,
        public string $content,
    ) {
    }

    public function toArray(): array
    {
        return json_decode(json_encode($this), true);
    }
}
