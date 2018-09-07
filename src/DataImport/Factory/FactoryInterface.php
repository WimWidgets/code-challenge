<?php

namespace App\DataImport\Factory;

interface FactoryInterface
{
    public static function create(object $data): mixed;
}
