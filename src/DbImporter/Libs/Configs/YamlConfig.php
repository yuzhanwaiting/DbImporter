<?php
/**
 * Created by PhpStorm.
 * User: fanliang
 * Date: 2016/5/24
 * Time: 11:13
 */
namespace DbImporter\Libs\Configs;

use Symfony\Component\Yaml\Yaml;

class YamlConfig extends ConfigProvider
{
    public $configPath;

    public $suffix;

    public $sources = [];

    public function loadConfig($config)
    {
        list($configPath, $suffix) = $config;
        $this->configPath = $configPath;
        $this->suffix = $suffix;
    }

    private function resolveRealPath($name)
    {
        return $this->configPath. $name . $this->suffix;
    }

    public function resolve($name)
    {
        $file = $this->resolveRealPath($name);

        $result = Yaml::parse(file_get_contents($file));
        //是否同步
        $result['sync'] = false;

        $this->sources[$name] = $result;

        return $this;
    }

    public function show($name = null)
    {
        return $name == null ? $this->sources : $this->sources[$name];
    }
}