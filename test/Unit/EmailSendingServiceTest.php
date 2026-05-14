<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Mantledevelopment\PhpTest\Channel\EmailSendingService;
use Mantledevelopment\PhpTest\Enum\NotificationType;
use Mantledevelopment\PhpTest\Notification;

final class EmailSendingServiceTest extends TestCase
{
    public function testValidEmailReturnsSuccess(): void
    {
        $emailSendingService = new EmailSendingService();
        $notification = new Notification(
            NotificationType::Email,
            'test@test.com',
            'this is a message'
        );

        $result = $emailSendingService->send($notification);


        $this->assertTrue($result->success);
    }
    public function testInvalidEmailSendsException(): void
    {
        $emailSendingService = new EmailSendingService();
        $notification = new Notification(
            NotificationType::Email,
            'test@testcom',
            'this is a message'
        );

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid email address');
        
        $emailSendingService->send($notification);
    }
}
