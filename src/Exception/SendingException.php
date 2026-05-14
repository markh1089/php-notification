<?php

namespace Mantledevelopment\PhpTest\Exception;

class SendingException extends \Exception
{
    public function __construct(
        string $message = 'There was an error sending the notification',
    ) {
        parent::__construct($message);
    }

}