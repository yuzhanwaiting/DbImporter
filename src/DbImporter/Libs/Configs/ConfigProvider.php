<?php
/**
 * Created by PhpStorm.
 * User: fanliang
 * Date: 2016/5/24
 * Time: 11:12
 */
namespace DbImporter\Libs\Configs;

abstract class ConfigProvider implements ConfigInterface
{

    public function __construct($config)
    {
        $this->loadConfig($config);
    }
}