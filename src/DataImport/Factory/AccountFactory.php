<?php

namespace App\DataImport\Factory;

use App\Entity\Account;

class AccountFactory implements FactoryInterface
{
    /**
     * @param object $data
     * @return Account
     */
    public static function create(object $data): Account
    {
        $account = new Account();
        $account->setNumber($data->account);
        $account->setName($data->name);
        $account->setEmail($data->email);
        $account->setBirthDateAt(self::parseBirthDateAt($data->date_of_birth));
        $account->setAddress($data->address);
        $account->setDescription($data->description);
        $account->setInterest($data->interest);
        $account->setIsChecked($data->checked);
        return $account;
    }

    /**
     * @param null|string $dateOfBirth
     * @return \DateTimeInterface|null
     */
    protected static function parseBirthDateAt(?string $dateOfBirth = null): ?\DateTimeInterface
    {
        return $dateOfBirth ? new \DateTime($dateOfBirth) : null;
    }
}
