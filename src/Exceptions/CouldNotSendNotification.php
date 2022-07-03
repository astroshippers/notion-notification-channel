<?php

namespace NotificationChannels\Notion\Exceptions;

class CouldNotSendNotification extends \Exception
{
    public static function serviceRespondedWithAnError($response): static
    {
        return new static('Notion responded with an error: `' . $response->getBody()->getContents() . '`');
    }

    public static function serviceRespondedWithValidationError($response): static
    {
        return new static('Notion responded with validation errors: `' . $response->getBody()->getContents() . '`');
    }
}
