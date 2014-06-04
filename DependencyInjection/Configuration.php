<?php

namespace Rk\LocaleBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;


class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('rk_locale');

        $rootNode
            ->children()
                ->scalarNode('default_target_path')
                    ->isRequired()
                ->end()
                ->arrayNode('langs')
                    ->defaultValue(array('fr','en','es'))
                    ->prototype('scalar')->end()
                ->end()
                ->scalarNode('domain')
                    ->defaultFalse()
                ->end()
            ->end()
        ;
        return $treeBuilder;
    }
}