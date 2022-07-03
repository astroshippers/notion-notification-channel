<?php

namespace NotificationChannels\Notion;

use Illuminate\Contracts\Support\Arrayable;

class NotionDatabaseItem
{
    private array $properties;

    public static function create(): static
    {
        return new static;
    }

    public function properties(array $properties): self
    {
        $this->properties = array_map(function ($property) {
            if ($property instanceof Arrayable) {
                return $property->toArray();
            }

            return $property;
        }, $properties);

        return $this;
    }

    public function toArray(): array
    {
        return [
            'properties' => $this->properties,
        ];
    }
}
