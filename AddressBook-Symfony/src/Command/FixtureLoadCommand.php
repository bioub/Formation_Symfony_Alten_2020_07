<?php

namespace App\Command;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class FixtureLoadCommand extends Command
{
    /** @var \Nelmio\Alice\Loader\SimpleFileLoader */
    protected $simpleFileLoader;

    /** @var ManagerRegistry */
    protected $managerRegistry;

    protected static $defaultName = 'fixture:load';

    /**
     * FixtureLoadCommand constructor.
     * @param \Nelmio\Alice\Loader\SimpleFileLoader $simpleFileLoader
     * @param ManagerRegistry $managerRegistry
     */
    public function __construct(\Nelmio\Alice\Loader\SimpleFileLoader $simpleFileLoader, ManagerRegistry $managerRegistry)
    {
        parent::__construct();
        $this->simpleFileLoader = $simpleFileLoader;
        $this->managerRegistry = $managerRegistry;
    }


    protected function configure()
    {
        $this
            ->setDescription('Generate fixtures with Alice and Faker')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Path to fixture yaml file, ex: fixtures/demo.yaml')
            ->addOption('truncate', 't', InputOption::VALUE_NONE, 'Empty table first')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $filePath = $input->getArgument('filePath');

        $absFilePath = __DIR__ . '/../../' . $filePath;

        if (!file_exists($absFilePath)) {
            $io->error(sprintf('Fixture file doesn\'t exist: %s', $filePath));
            return 1;
        }

        if ($input->getOption('truncate')) {
            /** @var Connection $connection */
            $connection = $this->managerRegistry->getConnection(); // DBAL

            $connection->exec('SET FOREIGN_KEY_CHECKS = 0');
            foreach ($connection->getSchemaManager()->listTableNames() as $table) {
                $connection->exec("TRUNCATE `$table`");
            }
            $connection->exec('SET FOREIGN_KEY_CHECKS = 1');
        }

        $set = $this->simpleFileLoader->loadFile($absFilePath);

        $entityManager = $this->managerRegistry->getManager();

        foreach ($set->getObjects() as $entity) {
            $entityManager->persist($entity);
        }

        $entityManager->flush();


        $io->success(count($set->getObjects()) . ' entities inserted');

        return 0;
    }
}
