<?php
/**
 * Created by PhpStorm.
 * User: fanliang
 * Date: 2016/5/16
 * Time: 14:52
 */
namespace DbImporter;

use Yuzhanwaiting\LaravelDbImporter\Libs\Exporters\Exporter;

class DbImporterServiceProvider extends ServiceProvider
{

    public function register()
    {

        //公共导出导入方法
        $this->app->singleton("dbimporter", function() {
            return new DbImporter();
        });


        //解析方法
        $this->app->singleton("dbimporter.parser", function($app) {
            return ParserFactory::make($app["config"]["dbimporter"]["origin"]["parser"],$app["config"]["dbimporter"]["origin"]["seederPath"]);
        });

        
        $this->app->singleton("dbimporter.exporter", function($app){
            return Exporter::make();
        });
        //存储方法
        $this->app->singleton("dbimporter.store", function(){
            
        });



    }

}
