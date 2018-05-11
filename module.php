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
    const CUSTOM_VERSION = '0.1';
    const CUSTOM_WEBSITE = 'https://github.com/UksusoFF/webtrees-tree_view_full_screen';

    protected $directory;

    protected $route;
    protected $template;

    public function __construct()
    {
        parent::__construct('tree_view_full_screen');

        $this->directory = WT_MODULES_DIR . $this->getName();

        $loader = new ClassLoader();
        $loader->addPsr4('UksusoFF\\WebtreesModules\\TreeViewFullScreen\\', $this->directory);
        $loader->register();

        $this->route = new Route(WT_MODULES_DIR, $this->getName(), self::CUSTOM_VERSION);
        $this->template = new Template($this->directory . '/templates/');
    }

    /** {@inheritdoc} */
    public function getName()
    {
        // warning: Must match (case-sensitive!) the directory name!
        return 'tree_view_full_screen';
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
            $controller->addExternalJavascript($this->route->getResourcePath('/_scripts/module.js'))
                ->addInlineJavascript($this->template->output('css_include.tpl', [
                    'cssPath' => $this->route->getResourcePath('/_styles/module.css'),
                ]), BaseController::JS_PRIORITY_LOW);
        }

        return null;
    }
}

return new TreeViewFullScreen();