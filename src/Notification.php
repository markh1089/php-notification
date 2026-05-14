<?php

namespace Mantledevelopment\PhpTest;

use Mantledevelopment\PhpTest\Enum\NotificationType;

readonly class Notification implements NotificationInterface
{
    public function __construct(
        private NotificationType $type,
        private string           $recipient,
        private string           $message
    ){
    }

    public function getType(): NotificationType
    {
        return $this->type;
    }

    public function getRecipient(): string
    {
        return $this->recipient;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}