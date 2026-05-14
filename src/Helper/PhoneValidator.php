<?php

namespace Mantledevelopment\PhpTest\Helper;

use libphonenumber\PhoneNumberUtil;

class PhoneValidator
{
    /**
     * Validate a phone number against GB phone rules (if country code is not passed)
      * @param string $phoneNumber
      * @param string $countryCode
      * @return boolean
      */

    public static function validate(string $phoneNumber, string $countryCode = 'GB'): bool
    {
        try{
        $phoneNumberUtil = PhoneNumberUtil::getInstance();
            $phoneNumber = $phoneNumberUtil->parse($phoneNumber, $countryCode);
            return $phoneNumberUtil->isValidNumber($phoneNumber);
        } catch (\Exception $e) {
            throw new \InvalidArgumentException('Invalid phone number' . ' - ' . $phoneNumber . ' - ' . $e->getMessage());
        }
    }
}