<?php
    require __DIR__ . '/../vendor/autoload.php';
    use SSH\Core\Application;
    use SSH\Core\Config;
    use SSH\Core\MySqliDatabase;

    session_start();
    try {
        $routes = new Config('routes');
        $dbconfig = new Config('database');
        $dbconnection = new MySqliDatabase($dbconfig);
        $facebook_config = new Config('facebook');

        $app = new Application(($_REQUEST['action'])??'default',$routes,$dbconnection);
        print $app->run($facebook_config);
    }
    catch (Exception $e){
        var_dump($e);
    }
    session_write_close();