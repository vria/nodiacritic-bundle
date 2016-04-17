<?php

namespace VRia\Bundle\NoDiacriticBundle\Test\DependencyInjection;


use Symfony\Component\DependencyInjection\ContainerBuilder;
use VRia\Bundle\NoDiacriticBundle\DependencyInjection\VRiaNoDiacriticExtension;

class VRiaNoDiacriticExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return ContainerBuilder
     */
    public function testLoadExtention()
    {
        $container = new ContainerBuilder();

        $loader = new VRiaNoDiacriticExtension();
        $loader->load(array(), $container);
        $this->assertTrue($container->hasDefinition('nodiacritic'));

        return $container;
    }

    /**
     * @depends testLoadExtention
     */
    public function testDefinitionHasCorrectClass(ContainerBuilder $container)
    {
        $definition = $container->getDefinition('nodiacritic');

        $this->assertEquals('VRia\Bundle\NoDiacriticBundle\Twig\Extension\NoDiacriticExtension', $definition->getClass());
    }
}
