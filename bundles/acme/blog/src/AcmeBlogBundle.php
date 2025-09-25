<?php

namespace Acme\BlogBundle;

use Acme\BlogBundle\Live\BlogComponent;
use Acme\BlogBundle\Live\MaliciousComponent;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class AcmeBlogBundle extends AbstractBundle
{
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->services()
            // ->defaults()->autowire()->autoconfigure()
            // ->load('Acme\\BlogBundle\\', '../src/')
            // ->exclude('src/{DependencyInjection,Entity,Kernel,Tests}');
        ;

         $container->services()
            ->set(BlogComponent::class)
            ->tag('twig.component', [
                'live' => true,
                'route' => 'ux_live_component',
                'url_reference_type' => 1,
            ])
            ->tag('controller.service_arguments')
        ;

         $container->services()
            ->set(MaliciousComponent::class)
            ->tag('twig.component', [
                'live' => true,
                'key' => 'logo',
                'template' => '@AcmeBlog/components/MaliciousComponent.html.twig',
                'route' => 'ux_live_component',
                'url_reference_type' => 1,
            ])
            ->tag('controller.service_arguments')
        ;
    }
}
