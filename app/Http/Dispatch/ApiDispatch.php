<?php

namespace App\Http\Dispatch;

//use App\Exceptions\HttpV3Exception;
use Illuminate\Http\Request;

class ApiDispatch extends Dispatch
{
    public function dispatch($controller, $method, Request $request)
    {
        $classController = ucfirst($controller);
        $className = "App\Http\Controllers\\$classController" . "Controller";
        if (class_exists($className) && method_exists($className, $method)) {
            $controller = new $className();
            return $controller->$method($request);
        } else {
//            throw new HttpV3Exception(40000);
            echo '路径错误';
        }
    }
}
