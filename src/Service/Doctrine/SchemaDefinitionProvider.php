<?php

namespace Chat\Service\Doctrine;

use Doctrine\DBAL\Migrations\Provider\SchemaProviderInterface;
use Doctrine\DBAL\Schema\Schema;

class SchemaDefinitionProvider implements SchemaProviderInterface
{
    /**
     * @var SchemaDefinition[]
     */
    private $definitions;

    public function __construct()
    {
        $this->definitions = [];
    }

    public function addDefinition(SchemaDefinition $definition)
    {
        $this->definitions[] = $definition;
    }

    public function createSchema()
    {
        $schema = new Schema();

        foreach ($this->definitions as $definition) {
            $definition->define($schema);
        }

        return $schema;
    }
}
