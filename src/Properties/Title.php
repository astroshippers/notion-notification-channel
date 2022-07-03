<?php

namespace NotificationChannels\Notion\Properties;

class Title extends AbstractProperty
{
    public function __construct(protected string $value)
    {
    }

    public function toArray(): array
    {
        return [
            'title' => [
                [
                    'type' => 'text',
                    'text' => ['content' => $this->value],
                ],
            ],
        ];
    }
}
