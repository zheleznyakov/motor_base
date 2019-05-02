<?php


namespace Application\Controllers;

use Application\Classes\View;
use Application\Models\UsersModel as UserModel;
use Application\Classes\DB;


abstract class MainController
{
    protected $view;
    protected $db;

    public function __construct()
    {
        $this->view = new View();
        $this->sessionStart();
    }
    protected function sessionStart()
    {
        session_start();
        if (isset($_SESSION['logged']))
            $this->view->logged = $_SESSION['logged'];
    }
    public function actionShow()
    {

        $this->view->display('main.twig');

    }

}