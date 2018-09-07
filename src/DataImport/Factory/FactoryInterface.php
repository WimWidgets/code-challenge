<?php

namespace App\DataImport\Factory;

interface FactoryInterface
{
    /**
     * @param \stdClass $data
     * @return mixed
     */
    public static function create(\stdClass $data);
}
