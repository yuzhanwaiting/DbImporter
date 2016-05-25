<?php
/**
 * Created by PhpStorm.
 * User: fanliang
 * Date: 2016/5/24
 * Time: 15:50
 */
namespace DbImporter\Libs\Trans;

use Doctrine\Common\Cache\CacheProvider;

class TransProvider
{
    protected $store;

    protected $destiny;

    protected $origin;

    protected $struct;
    
    public function __construct($config)
    {
        list($origin, $destiny, $store) = $config;

        $this->origin = $origin;
        $this->destiny = $destiny;
        $this->store = $store;
    }

}