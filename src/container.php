<?php

use Symfony\Component\{
    DependencyInjection\Reference,
    DependencyInjection\ContainerBuilder,
    HttpKernel\Controller\ControllerResolver,
    EventDispatcher\EventDispatcher,
    Routing\RequestContext,
    Routing\Matcher\UrlMatcher
};
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Phramework\Framework;
use Album\{
    Controller\PhotoController,
    Resource\PhotoResource
};

$sc = new ContainerBuilder();


$sc->register('context', RequestContext::class);
$sc->register('matcher', UrlMatcher::class)
        ->setArguments([
            $routes,
            new Reference('context')
        ]);
$sc->register('resolver', ControllerResolver::class);
$sc->register('dispatcher', EventDispatcher::class);
$sc->register('framework', Framework::class)
        ->setArguments([
            new Reference('matcher'),
            new Reference('resolver'),
        ]);
$settings = include('settings.php');
$sc->register('entity_manager', EntityManager::class)
        ->addMethodCall('create', [
            $settings['doctrine']['connection'],
            Setup::createAnnotationMetadataConfiguration(
                    $settings['doctrine']['meta']['entity_path'], true, null, null, false
            ),
        ]);
$sc->register('photo_resource', PhotoResource::class)
        ->setArguments([new Reference('entity_manager')]);
/**
 * @todo Find a way to register controller as a service to inject dependencies,
 * or use normal framework/micro-framework inste.
 */
$sc->register(PhotoController::class, PhotoController::class)
        ->setArguments([new Reference('photo_resource')]);

return $sc;
