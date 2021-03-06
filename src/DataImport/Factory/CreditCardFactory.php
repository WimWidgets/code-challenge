<?php

namespace App\DataImport\Factory;

use App\Entity\CreditCard;

class CreditCardFactory implements FactoryInterface
{
    /**
     * @param \stdClass $data
     * @return CreditCard
     */
    public static function create(\stdClass $data): CreditCard
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
        $expiresAt->setDate('20'.$parts[1], $parts[0], 1);
        return $expiresAt;
    }
}
