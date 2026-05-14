<?php

declare(strict_types=1);

use Mantledevelopment\PhpTest\Helper\ReferenceIdGenerator;
use PHPUnit\Framework\TestCase;

final class ReferenceIdGeneratorTest extends TestCase
{
    public function testWillAlwaysGenerateUniqueId(): void
    {
        $referenceId1 = ReferenceIdGenerator::generate();
        $referenceId2 = ReferenceIdGenerator::generate();

        $this->assertNotSame($referenceId1, $referenceId2);

    }
   
}
