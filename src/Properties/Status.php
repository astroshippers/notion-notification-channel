<?php

namespace NotificationChannels\Notion\Properties;

class Status extends AbstractProperty
{
    public function __construct(
        protected string $value,
        protected string $type = 'name',
        protected string $color = 'default',
    ) {
    }

    public function name(string $name): self
    {
        $this->type  = 'name';
        $this->value = $name;

        return $this;
    }

    public function id(string $id): self
    {
        $this->type  = 'id';
        $this->value = $id;

        return $this;
    }

    public function color(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'status' => [
                'type'  => $this->type,
                'value' => $this->value,
                'color' => $this->color,
            ],
        ];
    }
}
