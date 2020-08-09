<?php

class Route {


    public function run() {

        $controller = isset($_REQUEST["controller"]) ? trim($_REQUEST["controller"]) : "author";
        $controller = ucfirst($controller); // Author
        $controllerName = $controller."Controller"; // MVC\Controllers\AuthorController

        if (class_exists($controllerName)) {
            $controllerObject = new $controllerName();

            $action = isset($_REQUEST["action"]) ? trim($_REQUEST["action"]) : 'index';

            if (method_exists($controllerObject, $action)) {
                /**
                 * $controllerObject->index()
                 * $controllerObject->edit()
                 * $controllerObject->delete()
                 */
                return $controllerObject->$action();
            } else {
                $controllerObject = new ErrorController();

                return $controllerObject->redirect404(); //khi người dùng gửi đến request trên url bị sai -> trỏ đến 404.php
            }
        } else {
            $controllerObject = new ErrorController();

            return $controllerObject->redirect404();
        }



    }

}