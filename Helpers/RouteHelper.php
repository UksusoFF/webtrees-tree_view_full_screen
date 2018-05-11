<?php

namespace UksusoFF\WebtreesModules\TreeViewFullScreen\Helpers;

class RouteHelper
{
    protected $modulesDir;
    protected $moduleName;
    protected $moduleVersion;

    public function __construct($modulesDir, $moduleName, $moduleVersion)
    {
        $this->modulesDir = $modulesDir;
        $this->moduleName = $moduleName;
        $this->moduleVersion = $moduleVersion;
    }

    /**
     * @param string $resource
     * @param array $query
     * @return string
     */
    public function getResourcePath($resource, $query = [])
    {
        return WT_MODULES_DIR . $this->moduleName . $resource . '?' .
            http_build_query(array_merge($query, [
                'v' => $this->moduleVersion,
            ]));
    }
}