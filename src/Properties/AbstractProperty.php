<?php

namespace NotificationChannels\Notion\Properties;

use Illuminate\Contracts\Support\Arrayable;

abstract class AbstractProperty implements Arrayable
{
    public static function make(...$args): self
    {
        return new static(...$args);
    }

    abstract public function toArray(): array;
}
