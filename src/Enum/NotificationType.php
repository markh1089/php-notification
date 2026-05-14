<?php

namespace Mantledevelopment\PhpTest\Enum;

enum NotificationType: string
{
    case Email = 'Email';
    case SMS = 'SMS';
}
