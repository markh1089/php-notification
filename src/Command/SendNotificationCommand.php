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

#[AsCommand(name: 'app:send_notification', description: 'Sends a notification', help: 'This command sends a notification to a recipient using a specified channel. The channel must be one of the following: Email or SMS. The recipient must be a valid email address or phone number. The message must be a string.', usages: ['app:send_notification <channel> <recipient> <message>'])]
class SendNotificationCommand
{
    public function __construct(
        private NotificationServiceInterface $notificationService
    ) {}

    public function __invoke(
        #[Argument('The channel to send on.', suggestedValues: [NotificationType::Email->value, NotificationType::SMS->value])]
        NotificationType $channel,
        #[Argument('The recipient of the message.')]
        string $recipient,
        #[Argument('The message to send.')]
        string $message,
        SymfonyStyle $io
    ): int {

        $io->text(["Sending notification to $recipient on {$channel->value} channel with message \"$message\""]);

        try {
            $notification = new Notification(type: NotificationType::from($channel->value), recipient: $recipient, message: $message);
            $result = $this->notificationService->sendNotification($notification);
            $io->text("Result: " . ($result->success ? 'Success' : 'Failure') . " - {$result->referenceId}");
        }
        catch (\Throwable $throwable) {
            $io->error($throwable->getMessage());
        }

        $io->success("Notification successfully sent to $recipient");

        return Command::SUCCESS;
    }
}
