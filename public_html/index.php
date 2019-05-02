<?php
/**
 * Created by PhpStorm.
 * UsersModel: andrey
 * Date: 25.03.19
 * Time: 18:29
 */
namespace Application {
    use Application\Controllers\User;

    require (__DIR__ . '/../app/autoload.php');
    require (__DIR__.'/../app/vendor/autoload.php');

    //выделить путь без части get запросов
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    //разбить на части по знаку /
    $pathParts = explode('/',$path);

    $controllerName = !empty($pathParts[1])? $pathParts[1] : 'User';
    $actionName = !empty($pathParts[2])? $pathParts[2] : 'Show';

    $controllerName = 'Application\Controllers\\'.$controllerName;
    $actionName = 'action'.$actionName;

    $controller = new User();
    //var_dump($actionName);

    if (method_exists($controller,$actionName)) {
        $controller->$actionName();
    }


}
