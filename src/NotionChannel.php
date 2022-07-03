<?php

namespace NotificationChannels\Notion;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use NotificationChannels\Notion\Exceptions\CouldNotSendNotification;
use Illuminate\Notifications\Notification;

class NotionChannel
{
    const API_ENDPOINT = 'https://api.notion.com/v1/pages';
    const API_VERSION  = '2022-02-22';

    public function __construct(protected Client $client)
    {
    }

    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     *
     * @throws \NotificationChannels\Notion\Exceptions\CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        if (! $routing = collect($notifiable->routeNotificationFor('Notion'))) {
            return;
        }

        $notionParameters = $notification->toNotion($notifiable)->toArray();

        try {
            $this->client->post(self::API_ENDPOINT, [
                'body'    => json_encode([
                    'parent'     => [
                        'type'        => 'database_id',
                        'database_id' => $routing->get('database'),
                    ],
                    'properties' => $notionParameters['properties'],
                ]),
                'headers' => [
                    'Accept'         => 'application/json',
                    'Content-Type'   => 'application/json',
                    'Authorization'  => 'Bearer ' . $routing->get('token'),
                    'Notion-Version' => self::API_VERSION,
                ],
            ]);
        } catch (ClientException $exception) {
            throw match ($exception->getCode()) {
                400     => CouldNotSendNotification::serviceRespondedWithValidationError($exception->getResponse()),
                default => CouldNotSendNotification::serviceRespondedWithAnError($exception->getResponse()),
            };
        }
    }
}
