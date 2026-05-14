<?php

namespace Mantledevelopment\PhpTest\Channel;

use Mantledevelopment\PhpTest\NotificationInterface;
use Mantledevelopment\PhpTest\NotificationType;
use Mantledevelopment\PhpTest\SendResult;

/**
 * Service for sending email notifications.
 */
class EmailSendingService implements SendingServiceInterface
{
    public function send(NotificationInterface $notification): SendResult
    {
    }

    private function validateEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function supportsNotificationType(NotificationType $type): bool
    {
        return $type === NotificationType::Email;
    }
}