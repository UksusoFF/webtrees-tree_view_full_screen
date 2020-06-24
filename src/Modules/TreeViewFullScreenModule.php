<?php

namespace UksusoFF\WebtreesModules\TreeViewFullScreen\Modules;

use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleCustomInterface;
use Fisharebest\Webtrees\Module\ModuleCustomTrait;
use Fisharebest\Webtrees\Module\ModuleGlobalInterface;
use Fisharebest\Webtrees\Module\ModuleGlobalTrait;
use Fisharebest\Webtrees\View;

class TreeViewFullScreenModule extends AbstractModule implements ModuleCustomInterface, ModuleGlobalInterface
{
    use ModuleCustomTrait;
    use ModuleGlobalTrait;

    private $name = 'tree_view_full_screen';

    public const CUSTOM_VERSION = '0.7';

    public const CUSTOM_WEBSITE = 'https://github.com/UksusoFF/webtrees-tree_view_full_screen';

    public function boot(): void
    {
        View::registerNamespace($this->name(), $this->resourcesFolder() . 'views/');
    }

    public function title(): string
    {
        return 'Tree View Full Screen';
    }

    public function description(): string
    {
        return 'This module allow switch tree view to full screen mode.';
    }

    public function customModuleAuthorName(): string
    {
        return 'UksusoFF';
    }

    public function customModuleVersion(): string
    {
        return self::CUSTOM_VERSION;
    }

    public function customModuleSupportUrl(): string
    {
        return self::CUSTOM_WEBSITE;
    }

    public function resourcesFolder(): string
    {
        return __DIR__ . '/../../resources/';
    }

    public function headContent(): string
    {
        return view("{$this->name()}::style", [
            'path' => $this->assetUrl('styles/module.css'),
        ]);
    }

    public function bodyContent(): string
    {
        return view("{$this->name()}::script", [
            'path' => $this->assetUrl('scripts/module.js'),
        ]);
    }
}
