<?php

class Router
{
    private $routes;

    public function __construct(){
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    /*
     *
     * Returns request string
     *
     * */


    private function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run(){

        // Получить строку запроса
        $uri = $this->getURI();

        // Проверить наличие такого запроса в routes.php

        foreach ($this->routes as $uriPattern => $path) {

            // Если есть совпадение, определить какой контроллер и action обрабатывает запрос

            if(preg_match("~$uriPattern~", $uri)) {
                // Получаем внутренний путь из внешнего согласно правилу

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // Определить контроллер, action, параметры.
                $segments = explode('/', $internalRoute);

                $controllerName = ucfirst(array_shift($segments)) . 'Controller';
                $actionName = 'action' . ucfirst((array_shift($segments)));

                $parameters = $segments;


                // Подключить файл класса-контроллера

                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if(file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // Создать объект, вызвать метод (т.е. action)

                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if($result != null){
                    break;
                }
            }
        }
    }
}