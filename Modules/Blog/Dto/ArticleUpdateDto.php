<?php

namespace Modules\Blog\Dto;

use Shared\Dto\BaseDto;

final readonly class ArticleUpdateDto extends BaseDto
{
    public function __construct(
        public ?string $title = null,
        public ?string $content = null,
    ) {
    }
}
