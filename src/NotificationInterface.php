<?php

namespace Mantledevelopment\PhpTest;

interface NotificationInterface
{
    public function getType(): NotificationType;

    public function getRecipient(): string;

    public function getMessage(): string;
}