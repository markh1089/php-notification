<?php

namespace Mantledevelopment\PhpTest;

use Mantledevelopment\PhpTest\Channel\EmailSendingService;
use Mantledevelopment\PhpTest\Channel\SendingServiceInterface;
use Mantledevelopment\PhpTest\DTO\SendResult;

class NotificationService implements NotificationServiceInterface
{
    public function __construct(
        private readonly array $channels
    )
    {
    }

    public function sendNotification(NotificationInterface $notification): SendResult
    {
        //todo: integrate
        return SendResult::create(success:true, referenceId: 12345);
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