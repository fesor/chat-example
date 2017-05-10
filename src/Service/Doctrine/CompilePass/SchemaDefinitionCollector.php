<?php

namespace Chat\Service\Doctrine\CompilePass;

use Chat\Service\Doctrine\SchemaDefinition;
use Chat\Service\Doctrine\SchemaDefinitionProvider;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class SchemaDefinitionCollector implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $services = $container->findTaggedServiceIds(SchemaDefinition::TAG_NAME);
        $schemaProviderDefinition = $container->getDefinition(SchemaDefinitionProvider::class);

        foreach ($services as $id => $definition) {
            $schemaProviderDefinition->addMethodCall('addDefinition', [new Reference($id)]);
        }
    }
}
