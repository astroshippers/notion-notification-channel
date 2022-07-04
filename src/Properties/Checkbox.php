<?php

namespace NotificationChannels\Notion\Properties;

class Checkbox extends AbstractProperty
{
    public function __construct(
        protected bool $value,
    ) {
    }

    public function toArray(): array
    {
        return [
            'checkbox' => $this->value,
        ];
    }
}
