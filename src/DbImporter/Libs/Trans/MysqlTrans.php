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
    }




    public function resolve($name)
    {
        $this->struct[$name] = $this->store->fetch($name);

        $source = $this->struct[$name]['origin']['source'];

        $select = $this->resolveMap($source['table']['map']);

        $conn = $this->origin[$source['conn']];

        $queryBuilder = $conn->createQueryBuilder();


        $queryBuilder->select($select)->from("yf_" . $source['table']['name']);

        return $conn->fetchAll($queryBuilder->getSQL());
    }



    private function resolveMap($map)
    {
        $des = [];

        foreach($map as $key => $val) {
            array_push($des, $key. " as ". $val);
        }

        return $des;
    }

    public function export($name)
    {

    }


    public function import($name)
    {

    }
}