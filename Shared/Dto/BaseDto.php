<?php

namespace Shared\Dto;

readonly abstract class BaseDto
{
    public function toArray(): array
    {
        return json_decode(json_encode($this), true);
    }
}
