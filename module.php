<?php

namespace UksusoFF\WebtreesModules\TreeViewFullScreen;

use Composer\Autoload\ClassLoader;
use Fisharebest\Webtrees\Controller\BaseController;
use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleMenuInterface;
use Fisharebest\Webtrees\Theme;
use UksusoFF\WebtreesModules\TreeViewFullScreen\Helpers\RouteHelper as Route;
use UksusoFF\WebtreesModules\TreeViewFullScreen\Helpers\TemplateHelper as Template;

class TreeViewFullScreen extends AbstractModule implements ModuleMenuInterface
{
    const CUSTOM_VERSION = '0.2';
    const CUSTOM_NAME = 'tree_view_full_screen';
    const CUSTOM_WEBSITE = 'https://github.com/UksusoFF/webtrees-tree_view_full_screen';

    protected $directory;

    protected $route;
    protected $template;

    public function __construct()
    {
        parent::__construct(self::CUSTOM_NAME);

        $this->directory = WT_MODULES_DIR . self::CUSTOM_NAME;

        $loader = new ClassLoader();
        $loader->addPsr4('UksusoFF\\WebtreesModules\\TreeViewFullScreen\\', $this->directory);
        $loader->register();

        $this->route = new Route($this->directory, self::CUSTOM_NAME, self::CUSTOM_VERSION);
        $this->template = new Template($this->directory);
    }

    /** {@inheritdoc} */
    public function getName()
    {
        // warning: Must match (case-sensitive!) the directory name!
        return self::CUSTOM_NAME;
    }

    /** {@inheritdoc} */
    public function getTitle()
    {
        return 'Tree View Full Screen';
    }

    /** {@inheritdoc} */
    public function getDescription()
    {
        return 'This module allow switch tree view to full screen mode.';
    }

    /** {@inheritdoc} */
    public function defaultMenuOrder()
    {
        return 9999;
    }

    /** {@inheritdoc} */
    public function getMenu()
    {
        // We don't actually have a menu - this is just a convenient "hook" to execute
        // code at the right time during page execution
        global $controller;

        if (Theme::theme()->themeId() !== '_administration') {
            $controller->addExternalJavascript($this->route->getScriptPath('module.js'))
                ->addInlineJavascript($this->template->output('css_include.js', [
                    'cssPath' => $this->route->getStylePath('module.css'),
                ]), BaseController::JS_PRIORITY_LOW);
        }

        return null;
    }
}

return new TreeViewFullScreen();