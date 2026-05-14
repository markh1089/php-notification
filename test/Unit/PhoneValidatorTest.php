<?php

declare(strict_types=1);

use Mantledevelopment\PhpTest\Helper\PhoneValidator;
use PHPUnit\Framework\TestCase;

final class PhoneValidatorTest extends TestCase
{
    public function testValidPhoneNumberPasses(): void
    {
        $number = '07598765432';

        $this->assertTrue(PhoneValidator::validate($number, 'GB'));
    }
    public function testRegionWillAcceptGBPhonesByDefault(): void
    {
        $number = '07598765432';

        $this->assertTrue(PhoneValidator::validate($number));
    }
    public function testInvalidPhoneWillFail(): void
    {
        $number = 'ABC23674';

        $this->assertFalse(PhoneValidator::validate($number));
    }
    public function testAlternateUKFormatWillPass(): void
    {
        $number = '+447801665098';

        $this->assertTrue(PhoneValidator::validate($number));
    }
}
