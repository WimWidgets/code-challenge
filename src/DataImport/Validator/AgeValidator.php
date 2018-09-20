<?php

namespace App\DataImport\Validator;

use App\Entity\Account;

class AgeValidator implements ValidatorInterface
{
    /**
     * @param Account $account
     * @return bool
     */
    public static function validate(Account $account): bool
    {
        if (!$account->getBirthDateAt()) {
            return true;
        }
        $difference = $account->getBirthDateAt()->diff(new \DateTime(), true);
        return $difference->y >= 18 && $difference->y <= 65;
    }
}
