<?php

namespace NotificationChannels\Notion\Properties;

class Email extends AbstractProperty
{
    public function __construct(protected string $value)
    {
    }

    public function toArray(): array
    {
        return ['email' => $this->value];
    }
}
