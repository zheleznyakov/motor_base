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

    class User extends MainController
    {

        /**
         * Авторизация пользователя
         */
        public function actionLogin()
        {
            echo $_POST['email'];
            echo $_POST['password'];
        }
        public function actionShowUsers()
        {
            echo "hello";
            UserModel::setDB(DB::getInstance());
            var_dump(UserModel::getAll());
        }

    }
}