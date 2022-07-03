<?php

namespace NotificationChannels\Notion\Properties;

class Number extends AbstractProperty
{
    public function __construct(
        protected int $value
    ) {
    }

    public function toArray(): array
    {
        return [
            'number' => $this->value,
        ];
    }
}
