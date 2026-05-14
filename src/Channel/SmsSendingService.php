<?php

namespace Mantledevelopment\PhpTest\Channel;

use Mantledevelopment\PhpTest\NotificationInterface;
use Mantledevelopment\PhpTest\Enum\NotificationType;
use Mantledevelopment\PhpTest\DTO\SendResult;
use Mantledevelopment\PhpTest\Helper\PhoneValidator;
use Mantledevelopment\PhpTest\Helper\ReferenceIdGenerator;

/**
 * Service for sending SMS notifications.
 */
class SmsSendingService implements SendingServiceInterface
{
    public function send(NotificationInterface $notification): SendResult
    {
        $referenceId = ReferenceIdGenerator::generate();

        if (!$this->validatePhoneNumber($notification->getRecipient())) {
            throw new \InvalidArgumentException('Invalid phone number' . ' - ' . $notification->getRecipient() . ' - ' . $referenceId);
        }

        return SendResult::create(success: true, referenceId: $referenceId);
    }

    private function validatePhoneNumber(string $phoneNumber): bool
    {
        return PhoneValidator::validate($phoneNumber);
    }

    public function supportsNotificationType(NotificationType $type): bool
    {
        return $type === NotificationType::SMS;
    }
}