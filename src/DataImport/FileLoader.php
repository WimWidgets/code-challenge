<?php

namespace App\DataImport;

use Symfony\Component\HttpFoundation\File\File;

class FileLoader
{
    /**
     * @param File $file
     * @return string
     * @throws \Exception
     */
    public function load(File $file): string
    {
        if (!$file->isFile()) {
            throw new \Exception('The file you want to load does not exist.');
        }
        $data = file_get_contents($file->getRealPath());
        if ($data === false) {
            throw new \Exception('Failed loading your file.');
        }
        return $data;
    }
}
