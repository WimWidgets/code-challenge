<?php

namespace App\Command;

use App\DataImport\Importer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpFoundation\File\File;

class DataImportCommand extends Command
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('challenge:data-import')
            ->setDescription('Starts the data import for the code challenge.')
            ->addArgument('file', InputArgument::REQUIRED, 'Absolute path or url to the data file.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $file = new File($input->getArgument('file'));
        try {
            $importer = new Importer($this->em, $file);
            $importer->import();
            $io->success('Your data file has been successfully imported!');
        } catch (\Exception $e) {
            $io->error($e->getMessage());
        }
    }
}
