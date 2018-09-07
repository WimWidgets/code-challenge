<?php

namespace App\DataImport\FileParser;

interface FileParserInterface
{
    public function parse(string $data): array;
}
