<?php
namespace Core;
defined("APPPATH") OR die("Access denied");

class App
{
    /**
     * @var
     */
    private $_modulo;
    /**
     * @var
     */
    private $_controller="Index";

    /**
     * @var
     */
    private $_method = "index";

    /**
     * @var
     */
    private $_params = [];

    /**
     * @var
     */
    private $_modulos = array('agent','verifier','admin','dashboard','traveler','content');

    /**
     * @var
     */
    const NAMESPACE_CONTROLLERS = "\App\Controllers\\";
    const ADMIN_NAMESPACE_CONTROLLERS = "\App\Modules\\";

    /**
     * @var
     */
    const CONTROLLERS_PATH = ROOT."/App/Controllers/";

    const ADMIN_CONTROLLERS_PATH = ROOT."/App/Modules/";


    /**
     * [__construct description]
     */
    public function __construct()
    {
        //obtenemos la url parseada

        $url = $this->parseUrl();

      
        //comprobamos si es modulo
        if(in_array($url[0],$this->_modulos))
        {
            $this->_modulo=ucfirst($url[0]);

            if(isset($url[1])){
                $this->_controller=ucfirst($url[1]);
                unset($url[1]);

            }
            if(isset($url[2])) {
                //aquí tenemos el método
                $this->_method = $url[2];
                unset($url[2]);
            }

            unset($url[0]);
        }else{
            //si no existe el modulo, obtenemos del controlador del primer posicion y despues el metodo
            if(isset($url[0]))
            {
                $this->_controller=ucfirst($url[0]);
            }


            if(isset($url[1])) {
                //aquí tenemos el método
                $this->_method = $url[1];
                unset($url[1]);
            }
            unset($url[0]);

        }


        $this->_controller = str_replace('-','_',$this->_controller);

       // echo $this->_controller;

        $this->_method = str_replace('-','_',$this->_method);
        //asociamos el resto de segmentos a $this->_params para pasarlos al método llamado, por defecto será un array vacío
        $this->_params = $url ? array_values($url) : [];

     /*  echo 'modulo '.$this->_modulo.'<br>';
        echo 'controlador '.$this->_controller.'<br>';
        echo 'metodo '.$this->_method.'<br>';
        echo  'parametros:';
        print_r($this->_params);*/



    }

    /**
     * [parseUrl Parseamos la url en trozos]
     * @return [type] [description]
     */
    public function parseUrl()
    {
        if(isset($_GET["url"]))
        {
            return explode("/", filter_var(rtrim($_GET["url"], "/"), FILTER_SANITIZE_URL));
        }
    }

    /**
     * [render  lanzamos el controlador/método que se ha llamado con los parámetros]
     */
    public function run()
    {
        #if(!empty($this->_modulo))
        if($this->getModulo())
        {
            $ruta=self::ADMIN_CONTROLLERS_PATH.ucfirst($this->getModulo())."/Controllers/".$this->_controller."Controller.php";
            //obtenemos la clase con su espacio de nombres
            $fullClass = self::ADMIN_NAMESPACE_CONTROLLERS.ucfirst($this->getModulo())."\Controllers\\".$this->_controller.'Controller';

        }else{
            $ruta=self::CONTROLLERS_PATH.$this->_controller."Controller.php";
            //obtenemos la clase con su espacio de nombres
            $fullClass = self::NAMESPACE_CONTROLLERS.$this->_controller.'Controller';

        }

        //echo $fullClass;
        //comprobamos que exista el archivo en el directorio Controllers

        if(file_exists($ruta))
        {
            //echo self::CONTROLLERS_PATH.$this->_controller."Controller.php";

            //asociamos la instancia a $this->_controller
            $this->_controller = new $fullClass;

            if(!method_exists($this->_controller, $this->_method)) {
               $this->_method='index';
            }

        }
        else {
            echo $ruta.'<br/>';
            include ROOT . "/404.php";
            exit;
        }

        call_user_func_array([$this->_controller, $this->_method], $this->_params);
    }

    /**
     * [getConfig Obtenemos la configuración de la app]
     * @return [Array] [Array con la config]
     */
    public static function getConfig()
    {
        return parse_ini_file(APPPATH . '/config/config.ini');
    }

    /**
     * [getController Devolvemos el modulo actual]
     * @return [type] [String]
     */
    public function getModulo(){
        return $this->_modulo;
    }

    /**
     * [getController Devolvemos el controlador actual]
     * @return [type] [String]
     */
    public function getController()
    {
       
        return $this->_controller;
    }

    /**
     * [getMethod Devolvemos el método actual]
     * @return [type] [String]
     */
    public function getMethod()
    {
        return $this->_method;
    }

    /**
     * [getParams description]
     * @return [type] [Array]
     */
    public function getParams()
    {
        return $this->_params;
    }





}