<?php
/**
 * Created by PhpStorm.
 * User: fanliang
 * Date: 2016/5/18
 * Time: 11:37
 */


define('BASE_DIR' , __DIR__ . DIRECTORY_SEPARATOR);

define('VENDOR_DIR', BASE_DIR . "vendor" . DIRECTORY_SEPARATOR);

define('APP_DIR', BASE_DIR . 'src' . DIRECTORY_SEPARATOR . 'DbImporter' . DIRECTORY_SEPARATOR);


require_once (VENDOR_DIR. "autoload.php");


$config = require_once (APP_DIR. "config" . DIRECTORY_SEPARATOR . "config.php");



$dbImporter = new \DbImporter\DbImporter($config);


$dbImporter->configToStruct('role');
$dbImporter->structToData('role');