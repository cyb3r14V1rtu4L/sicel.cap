<?php
/**
 * Created by PhpStorm.
 * User: Cyberio
 * Date: 5/09/16
 * Time: 09:59 AM
 */
namespace Core;

use \Core\View;

class Controller{

    protected $view;

    public function __construct()
    {

         $this->view = new View();
    }

    protected function getLibrary($libreria)
    {
        $rutaLibreria = ROOT . 'libs' . DS . $libreria . '.php';

        if(is_readable($rutaLibreria)){
            require_once $rutaLibreria;
        }
        else{
            throw new Exception('Error de libreria');
        }
    }

    protected function redireccionar($ruta = false,$access=false)
    {
        $app = new App();

        if($app->getModulo() && $access==false)
        {
            header('location:' . BASE_URL . $app->getModulo()."/".$ruta);

            exit;
        }elseif($ruta){
            header('location:' . BASE_URL . $ruta);
            exit;
        } else{
            header('location:' . BASE_URL);
            exit;
        }
    }

    protected function getTexto($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = htmlspecialchars($_POST[$clave], ENT_QUOTES);
            return $_POST[$clave];
        }
        return '';
    }

    protected function getInt($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
            return $_POST[$clave];
        }
        return false;
    }

    protected function getPostParam($clave)
    {
        if(isset($_POST[$clave])){
            return $_POST[$clave];
        }
    }

    protected function getSql($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = strip_tags($_POST[$clave]);


            return trim($_POST[$clave]);
        }
    }

    protected function getAlphaNum($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = (string) preg_replace('/[^A-Z0-9_]/i', '', $_POST[$clave]);
            return trim($_POST[$clave]);
        }

    }

    public function validarEmail($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }

        return true;
    }

    public function pr($array)
    {
        if(is_array($array))
        {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }else{
            return var_dump($array);
        }
    }

}