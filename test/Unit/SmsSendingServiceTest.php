<?php

declare(strict_types=1);

use Mantledevelopment\PhpTest\Channel\SmsSendingService;
use Mantledevelopment\PhpTest\Enum\NotificationType;
use Mantledevelopment\PhpTest\Notification;
use PHPUnit\Framework\TestCase;

final class SmsSendingServiceTest extends TestCase
{
    public function testValidPhoneReturnsSuccess(): void
    {
        $smsSendingService = new SmsSendingService();
        $notification = new Notification(
            NotificationType::SMS,
            '07591865909',
            'this is a message'
        );

        $result = $smsSendingService->send($notification);


        $this->assertTrue($result->success);
    }
    public function testInvalidPhoneSendsException(): void
    {
        $smsSendingService = new SmsSendingService();
        $notification = new Notification(
            NotificationType::SMS,
            'ABC1234',
            'this is a message'
        );

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid phone number');

        $smsSendingService->send($notification);
    }
}
