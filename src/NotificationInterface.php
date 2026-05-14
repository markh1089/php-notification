<?php

namespace Mantledevelopment\PhpTest;

use Mantledevelopment\PhpTest\Enum\NotificationType;

interface NotificationInterface
{
    public function getType(): NotificationType;

    public function getRecipient(): string;

    public function getMessage(): string;
}