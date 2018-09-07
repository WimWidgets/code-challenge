<?php

namespace App\DataImport\Factory;

use App\Entity\CreditCard;

class CreditCardFactory implements FactoryInterface
{
    /**
     * @param object $data
     * @return CreditCard
     */
    public static function create(object $data): CreditCard
    {
        $creditCard = new CreditCard();
        $creditCard->setNumber($data->number);
        $creditCard->setType($data->type);
        $creditCard->setName($data->name);
        $creditCard->setExpiresAt(self::parseExpiresAt($data->expirationDate));
        return $creditCard;
    }

    /**
     * @param string $expirationDate
     * @return \DateTimeInterface
     */
    protected static function parseExpiresAt(string $expirationDate): \DateTimeInterface
    {
        $parts = explode('/', $expirationDate);
        $expiresAt = new \DateTime();
        $expiresAt->setDate($parts[1], $parts[0], 1);
        return $expiresAt;
    }
}
