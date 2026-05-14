<?php

namespace Mantledevelopment\PhpTest\Channel;

use Mantledevelopment\PhpTest\NotificationInterface;
use Mantledevelopment\PhpTest\Enum\NotificationType;
use Mantledevelopment\PhpTest\DTO\SendResult;
use Mantledevelopment\PhpTest\Helper\ReferenceIdGenerator;

/**
 * Service for sending email notifications.
 */
class EmailSendingService implements SendingServiceInterface
{
    public function send(NotificationInterface $notification): SendResult
    {
        $referenceId = ReferenceIdGenerator::generate();
        
        if (!$this->validateEmail($notification->getRecipient())) {
            throw new \InvalidArgumentException('Invalid email address' . ' - ' . $notification->getRecipient() . ' - ' . $referenceId);
        }

        return SendResult::create(success: true, referenceId: $referenceId);
    }

    public function supportsNotificationType(NotificationType $type): bool
    {
        return $type === NotificationType::Email;
    }

    private function validateEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}