<?php

namespace App\DataImport\Validator;

use App\Entity\Account;

class AccountValidator implements ValidatorInterface
{
    protected static $validators = [
        AgeValidator::class,
        CreditCardValidator::class,
    ];

    /**
     * @param Account $account
     * @return bool
     */
    public static function validate(Account $account): bool
    {
        foreach (self::$validators as $validator) {
            if (
                $validator instanceof ValidatorInterface &&
                !call_user_func($validator.'::validate', $account)
            ) {
                return false;
            }
        }
        return true;
    }
}
