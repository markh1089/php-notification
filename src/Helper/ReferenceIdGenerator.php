<?php
namespace Mantledevelopment\PhpTest\Helper;

class ReferenceIdGenerator
{
    public static function generate()
    {
        return uniqid();
    }
    
}