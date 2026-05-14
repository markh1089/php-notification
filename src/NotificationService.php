<?php

namespace Mantledevelopment\PhpTest;

use Mantledevelopment\PhpTest\Channel\EmailSendingService;
use Mantledevelopment\PhpTest\Channel\SendingServiceInterface;

class NotificationService implements NotificationServiceInterface
{
    public function __construct(
        private readonly array $channels
    )
    {
    }

    public function sendNotification(NotificationInterface $notification): SendResult
    {
    }

    private function getService(NotificationType $notificationType): SendingServiceInterface
    {
        /** @var SendingServiceInterface $channel */
        foreach ($this->channels as $channel) {
            if ($channel->supportsNotificationType($notificationType)) {
                return $channel;
            }
        }

        throw new \Exception("Unsupported channel: {$notificationType->value}");
    }
}