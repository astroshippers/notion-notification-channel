<?php

namespace NotificationChannels\Notion\Properties;

class RichText extends AbstractProperty
{
    public function __construct(
        protected array $value,
    ) {
    }

    public function toArray(): array
    {
        return ['rich_text' => $this->value];
    }
}
