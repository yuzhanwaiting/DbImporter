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
    
    public function __construct($config)
    {
        
    }

    public function loadStore(CacheProvider $store)
    {
        
    }
}