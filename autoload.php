<?php

use Composer\Autoload\ClassLoader;

$loader = new ClassLoader();
$loader->addPsr4('UksusoFF\\WebtreesModules\\TreeViewFullScreen\\', __DIR__);
$loader->register();