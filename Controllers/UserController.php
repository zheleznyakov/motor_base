<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 27.03.19
 * Time: 17:05
 */
require_once(__DIR__.'/../Models/User.php');
require_once(__DIR__.'/../Classes/View.php');
class UserController
{
    public function actionShow()
    {

        //$item=[];
        //$item['surname']=user::getUser();
        $v = new View();
        $v->surname = user::getUser();
        $v->display('OneUser.php');


    }
}