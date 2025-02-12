<?php

namespace Shared\Services;

class CacheService
{
    public function get(string $key): mixed
    {
        return cache()->get($key);
    }

    public function put(string $key, mixed $value, int $seconds = null): void
    {
        cache()->put($key, $value, $seconds);
    }

    public function forget(string $key): void
    {
        cache()->forget($key);
    }
}
