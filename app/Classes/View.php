<?php
/**
 * Created by PhpStorm.
 * UsersModel: andrey
 * Date: 27.03.19
 * Time: 16:58
 */

namespace Application\Classes {

    use Twig\Environment;
    use Twig\Loader\FilesystemLoader;

    class View
    {
        const dir = __DIR__ . '/../Views/';
        private $theme = "Theme";
        private $themeDir;
        private $data=[];

        private $twig;


        /**
         * View constructor. Подготавливает twig к работе
         */
        public function __construct()
        {

            //тема по умолчанию
            $this->themeDir = self::dir.'/'.$this->theme.'/';

            $loader = new FilesystemLoader($this->themeDir);
            $this->twig = new Environment($loader);

        }

        public function __set($name, $value)
        {
            $this->data[$name]=$value;
        }

        public function __get($name)
        {
            return $this->data[$name];
        }

        /**
         * Отображает twig шаблон
         * @param string $template имя файла шаблона
         * @throws \Twig\Error\LoaderError
         * @throws \Twig\Error\RuntimeError
         * @throws \Twig\Error\SyntaxError
         */
        public function display($template='main.twig')
        {

            echo $this->twig->render($template,$this->data);
        }
    }
}