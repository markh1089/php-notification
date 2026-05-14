<?php

namespace Mantledevelopment\PhpTest\Channel;

use Mantledevelopment\PhpTest\NotificationInterface;
use Mantledevelopment\PhpTest\Enum\NotificationType;
use Mantledevelopment\PhpTest\DTO\SendResult;

/**
 * Service for sending email notifications.
 */
class EmailSendingService implements SendingServiceInterface
{
    public function send(NotificationInterface $notification): SendResult
    {
        //todo: integrate
        return SendResult::create(success:true, referenceId: 12345);
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