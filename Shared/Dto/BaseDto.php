<?php

namespace Shared\Dto;

readonly abstract class BaseDto
{
    public function toArray(): array
    {
        return json_decode(json_encode($this), true);
    }

    public function toArrayOnlyNotNull(): array
    {
        return array_filter(get_object_vars($this), fn($value) => $value !== null);
    }
}
