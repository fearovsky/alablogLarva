<?php

namespace Modules\Blog\Dto;

use Shared\Dto\BaseDto;

final readonly class ArticleStoreDto extends BaseDto
{
    public function __construct(
        public string $title,
        public string $content,
    ) {
    }
}
