<?php
/**
 * Created by PhpStorm.
 * User: fanliang
 * Date: 2016/5/24
 * Time: 15:51
 */
namespace DbImporter\Libs\Trans;


use Doctrine\DBAL\Connection;

class MysqlTrans extends TransProvider
{
    protected $conn;

    public function __construct($config)
    {
        parent::__construct($config);
        list($connection,) = $config;
        $this->loadConn($connection);
    }

    private function loadConn(Connection $connection)
    {
        $this->conn = $connection;
    }


    public function resolve($name)
    {

    }

    public function export($name)
    {

    }


    public function import($name)
    {

    }
}