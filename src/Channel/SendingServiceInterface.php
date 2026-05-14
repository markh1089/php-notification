<?php

namespace Mantledevelopment\PhpTest\Channel;

use Mantledevelopment\PhpTest\Exception\SendingException;
use Mantledevelopment\PhpTest\NotificationInterface;
use Mantledevelopment\PhpTest\Enum\NotificationType;
use Mantledevelopment\PhpTest\DTO\SendResult;

/**
 * Interface for sending Notifications
 */
interface SendingServiceInterface
{
    /**
     * @param NotificationType $type
     * @return bool True if the notification type is supported, False if not
     */
    public function supportsNotificationType(NotificationType $type): bool;

    /**
     * @param NotificationInterface $notification
     * @return SendResult
     * @throws \InvalidArgumentException If the recipient is invalid.
     * @throws SendingException If there is an error sending the notification.
     */
    public function send(NotificationInterface $notification): SendResult;
}