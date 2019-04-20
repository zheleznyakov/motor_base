<?php


namespace Application\Controllers;

use Application\Classes\View;
use Application\Models\User as UserModel;


abstract class MainController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }
    public function actionShow()
    {

        $this->view->surname = UserModel::getUser();
        $this->view->display('main.twig');

    }

}