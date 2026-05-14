<?php

namespace Mantledevelopment\PhpTest\Exception;

use Mantledevelopment\PhpTest\Enum\NotificationType;

class InvalidChannelException extends \Exception
{
    public function __construct(
        private string $message,
        private ?NotificationType $channel, 
    )
    {
        parent::__construct($message . ' - ' . $channel->value);
    }
}