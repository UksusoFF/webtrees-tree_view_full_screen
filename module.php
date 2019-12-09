<?php

namespace UksusoFF\WebtreesModules\TreeViewFullScreen;

use Fisharebest\Webtrees\Webtrees;

if (defined('WT_MODULES_DIR')) {
    //this is a webtrees 2.x module. it cannot be used with webtrees 1.x. See README.md.
    return;
}

$modulesPath = Webtrees::MODULES_PATH;

foreach (glob(Webtrees::ROOT_DIR . $modulesPath . '*/autoload.php') as $autoloadFile) {
    require_once $autoloadFile;
}

return new TreeViewFullScreenModule();