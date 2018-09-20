<?php

namespace App\DataImport\Validator;

use App\Entity\Account;

interface ValidatorInterface
{
    /**
     * @param Account $account
     * @return bool
     */
    public static function validate(Account $account): bool;
}
