<?php
/**
 * Created by PhpStorm.
 * User: Sergey Pavliuckhov
 * Date: 20.03.2018
 * Time: 14:17
 */

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;


class MicroKernel extends Kernel
{

    use MicroKernelTrait;

    /*
     * {@inheritDoc}
     */
    public function registerBundles()
    {
        $bundles = [
          new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
          new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
          new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
          new Symfony\Bundle\TwigBundle\TwigBundle(),
          new DemoBundle\DemoBundle(),
        ];
        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
        }
        return $bundles;
    }

    /*
     * {@inheritDoc}
     */
    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            $routes->import('@WebProfilerBundle/Resources/config/routing/wdt.xml',
              '/_wdt');
            $routes->import('@WebProfilerBundle/Resources/config/routing/profiler.xml',
              '/_profiler');
        }
        $routes->import('@DemoBundle/Controller', '/', 'annotation');
    }

    /*
     * {@inheritDoc}
     */
    protected function configureContainer(
      ContainerBuilder $c,
      LoaderInterface $loader
    ) {
        $loader->load(__DIR__ . '/config_' . $this->getEnvironment() . '.yml');
    }

}