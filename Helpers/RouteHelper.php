<?php

namespace UksusoFF\WebtreesModules\TreeViewFullScreen\Helpers;

class RouteHelper
{
    protected $path;
    protected $moduleName;
    protected $moduleVersion;

    public function __construct($path, $moduleName, $moduleVersion)
    {
        $this->path = $path;
        $this->moduleName = $moduleName;
        $this->moduleVersion = $moduleVersion;
    }

    /**
     * @param string $resource
     * @param array $query
     *
     * @return string
     */
    private function getResourcePath($resource, $query = [])
    {
        return "{$this->path}/_resources/{$resource}" . '?' .
            http_build_query(array_merge($query, [
                'v' => $this->moduleVersion,
            ]));
    }

    /**
     * @param string $script
     * @param array $query
     *
     * @return string
     */
    public function getScriptPath($script, $query = [])
    {
        return $this->getResourcePath("scripts/$script", $query);
    }

    /**
     * @param string $style
     * @param array $query
     *
     * @return string
     */
    public function getStylePath($style, $query = [])
    {
        return $this->getResourcePath("styles/$style", $query);
    }
}