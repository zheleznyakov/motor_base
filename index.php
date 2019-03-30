<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 25.03.19
 * Time: 18:29
 */
require_once (__DIR__.'/Controllers/UserController.php');
require_once (__DIR__.'/Models/User.php');
if (isset($_GET['action'])){
    $controller = new UserController();
    $act = 'action'.$_GET['action'];
    $controller->$act();
}
