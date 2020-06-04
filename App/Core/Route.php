<?php

class Route
{
    static function start()
    {
        session_start();
        $controller_name = 'Main';
        $action_name = 'default';

        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if ( !empty($routes[1]) )
        {
            //clean get parameters for correct including controller
            $routes[1] = preg_replace('/[a-z]{1,}=[0-9a-z_]{1,}/', '', $routes[1]);
            $routes[1] = preg_replace('/[&?=_]/', '', $routes[1]);
            $routes[1] = array_map('ucfirst',  explode('-',$routes[1]));
            $routes[1] = implode('', $routes[1]);
            $controller_name = str_replace('-', '', $routes[1]);


            if(empty($controller_name)){
                $controller_name = 'Main';
            }
        }

        //if you want you can call action method in controller
        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }

        $model_name = 'Model'.$controller_name;
        $controller_name = 'Controller'.$controller_name;
        $action_name = 'action_'.$action_name;

        $model_file = strtolower($model_name).'.php';
        $model_path = "App/Models/".$model_file;
        if(file_exists($model_path))
        {
            include "App/Models/".$model_file;
        }

        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "App/Controllers/".$controller_file;
        if(file_exists($controller_path))
        {
            include "App/Controllers/".$controller_file;
        }
        else
        {
            Route::ErrorPage404();
        }

        $controller = new $controller_name;
        $action = $action_name;

        if(method_exists($controller, $action))
        {
            $controller->$action();
        }
        else
        {
           Route::ErrorPage404();
        }

    }

    static function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}