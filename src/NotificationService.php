<?php

namespace Mantledevelopment\PhpTest;

use Mantledevelopment\PhpTest\Channel\EmailSendingService;
use Mantledevelopment\PhpTest\Channel\SendingServiceInterface;
use Mantledevelopment\PhpTest\DTO\SendResult;
use Mantledevelopment\PhpTest\Enum\NotificationType;

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
            throw new \Exception( $e->getMessage());
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

        throw new \Exception("Unsupported channel: {$notificationType->value}");
    }
}