<?php
/**
 * Created by PhpStorm.
 * User: fanliang
 * Date: 2016/5/16
 * Time: 14:23
 */
namespace DbImporter;

use Doctrine\Common\Cache\FilesystemCache;
use Doctrine\DBAL\DriverManager;

class DbImporter
{

    protected $configuration;

    protected $store;

    protected $trans;

    protected $origin;

    protected $destiny;

    public function __construct($config)
    {
        //实例化配置类
        $this->resolveConfiguration($config['config']);


        //实例化存储类
        $this->resolveStore($config['store']);


        //实例化转换类
        $this->resolveTrans($config['trans']);
    }


    public function configToStruct($name)
    {
        $this->save($name, $this->configuration->resolve($name)->show($name));
    }

    public function structToData($name)
    {
        $this->trans->resolve($name);
    }

    private function save($key, $data)
    {
        $this->store->save($key, $data);
    }


    private function resolveTrans($config)
    {

        $classname =  "DbImporter\\Libs\\Trans\\" . ucfirst($config['driver']) ."Trans";

        switch ($config['driver']) {
            case "mysql":
                foreach($config['origin'] as $key => $val) {
                    $this->origin[$key] = DriverManager::getConnection($val);
                }
                $this->destiny = DriverManager::getConnection(array_values($config['destiny'])[0]);

                $this->trans = new $classname([$this->origin, $this->destiny, $this->store]);
                break;
        }
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