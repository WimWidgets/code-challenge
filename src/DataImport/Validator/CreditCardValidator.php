<?php

namespace App\DataImport\Validator;

use App\Entity\Account;
use App\Entity\CreditCard;

class CreditCardValidator implements ValidatorInterface
{
    /**
     * @param Account $account
     * @return bool
     */
    public static function validate(Account $account): bool
    {
        foreach ($account->getCreditCards() as $creditCard) {
            if (self::hasThreeEqualConsecutiveNumbers($creditCard)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param CreditCard $creditCard
     * @return bool
     */
    protected static function hasThreeEqualConsecutiveNumbers(CreditCard $creditCard): bool
    {
        $consecutiveCount = 0;
        $lastNumber = '';
        $numbers = str_split($creditCard->getNumber());
        foreach ($numbers as $number) {
            if ($number === $lastNumber) {
                ++$consecutiveCount;
            }
            if ($consecutiveCount === 3) {
                return true;
            }
            $lastNumber = $number;
        }
        return false;
    }
}
