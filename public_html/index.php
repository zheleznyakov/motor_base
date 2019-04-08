<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 25.03.19
 * Time: 18:29
 */
namespace Application {

    use Application\Controllers\User;

    require (__DIR__ . '/../app/autoload.php');
    require (__DIR__.'/../app/vendor/autoload.php');
    echo uniqid("invite");

    if (isset($_GET['action'])){
        $controller = new User();
        $act = 'action'.$_GET['action'];
        if (method_exists($controller,$act)) {
            $controller->$act();
        }
    }
}
