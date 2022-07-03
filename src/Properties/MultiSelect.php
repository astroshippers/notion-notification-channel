<?php

namespace NotificationChannels\Notion\Properties;

class MultiSelect extends AbstractProperty
{
    public function __construct(
        protected array $items,
    ) {
    }

    public function toArray(): array
    {
        return [
            'multi_select' => array_map(fn($item) => ['name' => $item], $this->items),
        ];
    }
}
