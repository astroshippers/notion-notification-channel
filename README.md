## Installation

```shell
composer require astroshippers/notion-notification-channel
```

## Usage

Inside eloquent model:

```php
public function routeNotificationForNotion(): array
{
    return [
        'token'    => config('services.notion.token'),
        'database' => '8e12b788392e4367b0532c9abb519133',
    ];
}
```

Inside notification class:

```php
use NotificationChannels\Notion\{NotionChannel, NotionDatabaseItem};
use NotificationChannels\Notion\Properties\{Checkbox, Email, MultiSelect, Number, RichText, Status, Title, URL};

public function via($notifiable)
{
    return [NotionChannel::class];
}

public function toNotion(User $notifiable): NotionDatabaseItem
{
    return NotionDatabaseItem::create()
        ->properties([
            'Name'          => Title::make('John Doe'),
            'Email'         => Email::make('demo@email.com'),
            'SomeNumber'    => Number::make(12345),
            'Tags'          => MultiSelect::make(['blah', 'blah2', 'blah3']),
            'True or False' => Checkbox::make(false),
            'URL'           => URL::make('https://developers.notion.com/reference/property-value-object'),
            'Some Text'     => RichText::make([
                [
                    "type" => "text",
                    "text" => [
                        "content" => "Some more text with ",
                    ]
                ],
            ]),
        ]);
}
```
