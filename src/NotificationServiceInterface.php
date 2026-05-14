<?php

namespace Mantledevelopment\PhpTest;

use InvalidArgumentException;
use Mantledevelopment\PhpTest\Exception\InvalidChannelException;
use Mantledevelopment\PhpTest\Exception\SendingException;
use Mantledevelopment\PhpTest\DTO\SendResult;


interface NotificationServiceInterface
{
    /**
     * Send a notification to the specified channel.
     *
     * @param NotificationInterface $notification
     *
     * @return SendResult Can be inspected for sending success or failure
     * @throws InvalidArgumentException If the recipient is invalid.
     * @throws SendingException If there is an error sending the notification.
     * @throws InvalidChannelException If the channel is not supported
     */
    public function sendNotification(NotificationInterface $notification): SendResult;
}