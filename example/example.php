<?php

require __DIR__.'/../vendor/autoload.php';

use CanalTP\MediaManager\Company\Company;
use CanalTP\MediaManager\Company\Configuration\Builder\ConfigurationBuilder;
use CanalTP\MediaManager\Media\Builder\MediaBuilder;
use CanalTP\MediaManager\Category\Line;

$array = array(
    'company' => array(
    'storage' => array(
        'type' => 'filesystem',
        'path' => __DIR__ . '/my_storage/',
    ),
    'strategy' => 'default'
    ),
);

$company = new Company();
$configurationBuilder = new ConfigurationBuilder();
$mediaBuilder = new MediaBuilder();
$category = new Line();

$configurationBuilder->buildConfiguration($array);

$company->setName("My_Company");
$company->setConfiguration($configurationBuilder->getConfiguration());

$media = $mediaBuilder->buildMedia(
    '../tests/data/CanalTP/sound/jingle_SNCF.mp3',
    $company,
    $category
);

$company->getStorage()->addMedia($media, $company->getStrategy());