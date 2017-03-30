<?php

use Doctrine\ORM\Tools\{
    Console\ConsoleRunner,
    Setup
};
use Doctrine\ORM\EntityManager;

// replace with file to your own project bootstrap
require_once 'vendor/autoload.php';
$settings = include('src/settings.php');
$config   = Setup::createAnnotationMetadataConfiguration(
                $settings['doctrine']['meta']['entity_path'], true, null, null, false
);

// replace with mechanism to retrieve EntityManager in your app
$entityManager = EntityManager::create($settings['doctrine']['connection'], $config);

return ConsoleRunner::createHelperSet($entityManager);
