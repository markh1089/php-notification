<?php

namespace Mantledevelopment\PhpTest\DTO;

class SendResult
{
    private function __construct(
        public readonly bool $success,
        public readonly string $referenceId
    ) {}

    /**
     * Create a new SendResult instance
     * @param bool $success Whether the send was successful
     * @param string $referenceId The reference ID from the method call
     * @return self
     */

    public static function create(bool $success, string $referenceId): self
    {
        return new self(success: $success, referenceId: $referenceId);
    }
}
