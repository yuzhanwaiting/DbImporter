<?php
/**
 * Created by PhpStorm.
 * User: fanliang
 * Date: 2016/5/16
 * Time: 14:23
 */
namespace DbImporter;

use Doctrine\Common\Cache\FilesystemCache;

class DbImporter
{

    protected $configuration;

    protected $store;



    public function __construct($config)
    {
        //实例化配置类
        $this->resolveConfiguration($config['config']);


        //实例化存储类
        $this->resolveStore($config['store']);
    }


    public function configToStruct()
    {
        
    }
    

    /**
     * get instance of store
     * @param $config
     */
    private function resolveStore($config)
    {
        switch($config['driver']) {
            case "file" :
                $this->store = new FilesystemCache($config['basePath']);
                break;
        }
    }


    /**
     * get instance of configuration
     * @param $config
     */
    private function resolveConfiguration($config)
    {
        $classname =  "DbImporter\\Libs\\Configs\\" . ucfirst($config['driver']) ."Config";
        unset($config['driver']);
        $this->configuration = new $classname(array_values($config));
    }

}