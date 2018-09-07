<?php

namespace App\DataImport;

use App\DataImport\FileParser\CsvFileParser;
use App\DataImport\FileParser\FileParserInterface;
use App\DataImport\FileParser\JsonFileParser;
use App\DataImport\FileParser\XmlFileParser;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\File;

class Importer
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    /**
     * @var File
     */
    protected $file;

    /**
     * Importer constructor.
     * @param EntityManagerInterface $em
     * @param File $file
     */
    public function __construct(EntityManagerInterface $em, File $file)
    {
        $this->em = $em;
        $this->file = $file;
    }

    /**
     * @throws \Exception
     */
    public function import()
    {
        $loadedData = $this->loadFile();
        $parsedData = $this->parseFile($loadedData);
        $this->processData($parsedData);
    }

    /**
     * @return string
     * @throws \Exception
     */
    protected function loadFile(): string
    {
        $fileLoader = new FileLoader();
        return $fileLoader->load($this->file);
    }

    /**
     * @param string $data
     * @return array
     * @throws \Exception
     */
    protected function parseFile(string $data): array
    {
        $fileParser = $this->getFileParser();
        return $fileParser->parse($data);
    }

    /**
     * @return FileParserInterface
     * @throws \Exception
     */
    protected function getFileParser(): FileParserInterface
    {
        $extension = $this->file->getExtension();
        switch ($extension) {
            case 'json':
                return new JsonFileParser();
            case 'xml':
                return new XmlFileParser();
            case 'csv':
                return new CsvFileParser();
            default:
                throw new \Exception('Only files of type JSON, XML and CSV are supported.');
        }
    }

    protected function processData(array $data)
    {
        //
    }
}