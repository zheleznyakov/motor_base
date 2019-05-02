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
    //echo uniqid("invite");
    //echo '<br/>';
    //echo password_hash('root', PASSWORD_ARGON2I);
    //echo '<br/>';
    //echo password_verify('root',password_hash('root', PASSWORD_ARGON2I));



    if (isset($_GET['user'])){
        $controller = new User();
        $act = 'action'.$_GET['user'];
        if (method_exists($controller,$act)) {
            $controller->$act();
            die;
        }
    }

    //login и пароль передаются методом post user=Login email = em password = pw
    if (isset($_POST['user'])){
        $controller = new User();
        $act = 'action'.$_POST['user'];
        if (method_exists($controller,$act)) {
            $controller->$act();
            die;
        }
    }

    $controller = new User();
    $controller->actionShow();

}
