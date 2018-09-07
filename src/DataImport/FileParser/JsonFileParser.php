<?php

namespace App\DataImport\FileParser;

class JsonFileParser implements FileParserInterface
{
    /**
     * @param string $data
     * @return array
     * @throws \Exception
     */
    public function parse(string $data): array
    {
        $paredData = json_decode($data);
        $this->checkForError();
        return $paredData;
    }

    /**
     * @throws \Exception
     */
    protected function checkForError()
    {
        $error = json_last_error();
        if ($error !== JSON_ERROR_NONE) {
            throw new \Exception(json_last_error_msg());
        }
    }
}
