<?php

namespace NotificationChannels\Notion\Properties;

class PhoneNumber extends AbstractProperty
{
    public function __construct(
        protected string $value
    ) {
    }

    public function toArray(): array
    {
        return ['phone_number' => $this->value];
    }
}
