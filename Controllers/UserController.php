<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 27.03.19
 * Time: 17:05
 */
require_once(__DIR__.'/../Models/User.php');
class UserController
{
    public function actionShow()
    {

        $item=[];
        $item['surname']=user::getUser();
        ob_start();
        require (__DIR__.'/../Views/OneUser.php');
        $content=ob_get_clean();
        require (__DIR__.'/../Views/layout.php');
        print(ob_get_clean());


    }
}