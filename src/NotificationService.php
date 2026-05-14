<?php

namespace Mantledevelopment\PhpTest;

use Mantledevelopment\PhpTest\Channel\SendingServiceInterface;
use Mantledevelopment\PhpTest\DTO\SendResult;
use Mantledevelopment\PhpTest\Enum\NotificationType;
use Mantledevelopment\PhpTest\Exception\SendingException;
use Mantledevelopment\PhpTest\Exception\InvalidChannelException;


class NotificationService implements NotificationServiceInterface
{
    public function __construct(
        private readonly array $channels
    ) {}

    public function sendNotification(NotificationInterface $notification): SendResult
    {
        $service = $this->getService(NotificationType::from($notification->getType()->value));

        try {
            $result = $service->send($notification);
        } catch (\Exception $e) {
            throw new SendingException(message: $e->getMessage());
        }

        return SendResult::create(success: $result->success, referenceId: $result->referenceId);
    }

    private function getService(NotificationType $notificationType): SendingServiceInterface
    {
        /** @var SendingServiceInterface $channel */
        foreach ($this->channels as $channel) {
            if ($channel->supportsNotificationType($notificationType)) {
                return $channel;
            }
        }

        throw new InvalidChannelException(
            message: "Unsupported channel: {$notificationType->value}",
            channel: $notificationType,
        );
    }
}
