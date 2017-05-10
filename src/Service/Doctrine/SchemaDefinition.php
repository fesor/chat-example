<?php

namespace Chat\Service\Doctrine;

use Doctrine\DBAL\Schema\Schema;

interface SchemaDefinition
{
    const TAG_NAME = 'doctrine.schema_definition';

    public function define(Schema $schema): void;
}
