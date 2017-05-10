<?php

namespace Chat\Service\Doctrine\Command;

use Doctrine\Bundle\MigrationsBundle\Command\MigrationsDiffDoctrineCommand;
use Symfony\Component\Console\Input\InputOption;

class DbalMigrationDiff extends MigrationsDiffDoctrineCommand
{
    protected function configure()
    {
        parent::configure();

        $this->addOption('db', null, InputOption::VALUE_REQUIRED, 'The database connection to use for this command.');
    }
}