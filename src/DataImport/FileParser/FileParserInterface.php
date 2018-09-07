<?php

namespace App\DataImport\FileParser;

interface FileParserInterface
{
    /**
     * @param string $data
     * @return array
     */
    public function parse(string $data): array;
}
