<?php

declare(strict_types=1);

namespace Mantledevelopment\PhpTest\Command;

use Mantledevelopment\PhpTest\Notification;
use Mantledevelopment\PhpTest\NotificationServiceInterface;
use Mantledevelopment\PhpTest\Enum\NotificationType;
use Symfony\Component\Console\Attribute\Argument;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(name: 'app:send_notification', description: 'Sends a notification')]
class SendNotificationCommand
{
    public function __construct(
         private NotificationServiceInterface $notificationService
    )
    {
    }

    public function __invoke(
        #[Argument('The channel to send on.', suggestedValues: ['Email', 'SMS'])]
        string $channel,
        #[Argument('The recipient of the message.')]
        string $recipient,
        #[Argument('The message to send.')]
        string $message,
        SymfonyStyle $io
    ): int
    {
        dump('hit!');
        return Command::SUCCESS;
    }
}
