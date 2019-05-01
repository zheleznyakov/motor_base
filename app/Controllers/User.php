<?php
/**
 * Created by PhpStorm.
 * UsersModel: andrey
 * Date: 27.03.19
 * Time: 17:05
 */
//require_once(__DIR__.'/../Models/UsersModelsModel.php');
//require_once(__DIR__.'/../Classes/View.php');
namespace Application\Controllers {

    use Application\Classes\DB;
    use Application\Classes\View;
    use Application\Models\UsersModel as UserModel;
    use Application\Models\UsersModel;

    class User extends MainController
    {
        /**
         * Авторизация пользователя
         */
        public function actionLogin()
        {

            UsersModel::setDB(DB::getInstance());

            $this->view->messageType = 'alert';

            if (!isset($_POST['email']))
            {
                $this->view->message = "Вы не ввели email во время авторизации!";
                $this->view->display();
                return;
            }
            $res = UserModel::findByEmail($_POST['email']);
            if (!isset($res))
            {
                $this->view->message = "Пользователь не существует!";
                $this->view->display();
                return;
            }
            if (!$res->verify($_POST['password']))
            {
                $this->view->message = "Пароль не совпал!";
                $this->view->display();
                return;
            }
            session_start();
            $_SESSION['user'] = $res->name;
            $this->view->messageType = 'success';
            $this->view->message = "Добро пожаловать ".$res->name;
            $this->view->display();



        }
        public function actionShowUsers()
        {
            echo "hello";
            UserModel::setDB(DB::getInstance());
            var_dump(UserModel::findByEmail("zhelezny.andrey@gmail.com"));
        }

    }
}