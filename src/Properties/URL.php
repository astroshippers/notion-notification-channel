<?php

namespace NotificationChannels\Notion\Properties;

class URL extends AbstractProperty
{
    public function __construct(protected string $value)
    {
    }

    public function toArray(): array
    {
        return ['url' => $this->value];
    }
}
