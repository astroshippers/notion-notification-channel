<?php

namespace NotificationChannels\Notion\Properties;

class Select extends AbstractProperty
{
    public function __construct(
        protected string $value,
    ) {
    }

    public function toArray(): array
    {
        return [
            'select' => $this->value,
        ];
    }
}
