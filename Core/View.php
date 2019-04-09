<?php
/**
 * Created by PhpStorm.
 * User: Cyberio
 * Date: 5/09/16
 * Time: 10:00 AM
 */
namespace Core;

defined("APPPATH") OR die("Access denied");

/**
 * Class View
 * @package Core
 */

class View {

    protected static $data;
    private  $modulo;
    private  $controlador;
    private  $metodo;
    private $rutas = array();
    private $templates = array();
    private $_js = array();
    private $_css = array();

    private $_plugginscss;
    private $_plugginsjs;


    const VIEWS_PATH = ROOT."/App/Views/";
    const MODULE_VIEW_PATH = ROOT."/App/Modules/";
    const LAYOUT_PATH = ROOT."/App/Layout/Templates";
    const PLUGIN_PATH = ROOT."/App/Layout/assets/plugins/";
    const EXTENSION_TEMPLATES = ".php";
    const DEFAULT_ADMIN_LAYOUT='backend';
    const DEFAULT_LAYOUT='frontend';


    public function __construct()
    {

        $app = new App();

        $this->modulo=  $app->getModulo();
        $this->controlador= $app->getController();

        if($this->modulo)
        {
            $this->rutas['view_js']='/App/Modules/' .$this->modulo. '/Views/' .$this->controlador.  '/js/';
         }else{
            $this->rutas['view_js']='/App/Views/' .$this->controlador.'/js/';
        }
        $this->_rutas['plugins'] = '/App/Layout/assets/plugins/';
    }

    public function render($template)
    {
       if($this->modulo)
       {
           $layout= self::DEFAULT_ADMIN_LAYOUT;
           $ruta=self::MODULE_VIEW_PATH .$this->modulo.'/Views/'.$this->controlador;
       }else{
           $layout= self::DEFAULT_LAYOUT;
           $ruta=self::VIEWS_PATH .$this->controlador;
       }


       if(!file_exists($ruta)) {
           echo "Error: El archivo " . $ruta . " no existe";
       }

       ob_start();

       if(self::$data) {
           extract(self::$data);
       }

       $params['css']='/App/Layout/assets/css/';
       $params['js']='/App/Layout/assets/js/';
       $params['plugins'] = '/App/Layout/assets/plugins/';
       $params['view_js']=$this->_js;

       $params['layout_css']='/App/Layout/'.$layout.'/css/';
       $params['layout_js']='/App/Layout/'.$layout.'/js/';

       $params['plugins_css']=$this->_plugginscss;
       $params['plugins_js']=$this->_plugginsjs;

       $session=$_SESSION;

     /* $views = APPPATH.'/Views';
       $cache = APPPATH.'/Views/cache';*/
      // $blade = new Blade($views, $cache);

       //$renderer = new BladeRenderer($views, array('cache_path' => $cache));

       $modulo=$this->modulo;
       $controlador=$this->controlador;
       $params=$params;


      /* echo $renderer->render($this->controlador.'.'.$template,$data);*/

       /*echo  $blade->view()->make($this->controlador.'.'.$template)->render(compact($params));*/
       Session::message();
       include_once APPPATH . DS . 'Layout' . DS . $layout . DS . 'header'. self::EXTENSION_TEMPLATES;
       include_once $ruta. DS .$template.self::EXTENSION_TEMPLATES;
       include_once APPPATH . DS . 'Layout' . DS . $layout . DS . 'footer'. self::EXTENSION_TEMPLATES;


       $str = ob_get_contents();
       ob_end_clean();
       echo $str;
   }

   public function template($template)
   {
       $ruta=self::LAYOUT_PATH .'/'. $template . "." . self::EXTENSION_TEMPLATES;

       if(!file_exists($ruta))
       {
           echo "Error: File => " . $ruta . " don't exists";
       }

       ob_start();

       if(self::$data)
       {
           extract(self::$data);
       }

       include_once($ruta);

       $str = ob_get_contents();
       ob_end_clean();
       echo $str;

   }


    public  function set($name, $value)
    {
        self::$data[$name] = $value;
    }

    public function setJs(array $js)
    {
        if(is_array($js) && count($js)){
            for($i=0; $i < count($js); $i++){
                $this->_js[] = $this->rutas['view_js']. $js[$i] . '.js';
            }
        }
        else{
            throw new Exception('Error In js');
        }
    }

    public function setCss(array $css)
    {
        if(is_array($css) && count($css)){
            for($i=0; $i < count($css); $i++){
                $this->_css[] = $this->_rutas['css']. $css[$i] . '.css';
            }
        }
        else{
            throw new Exception('Error In css');
        }
    }

    public function getPlugins($folders=array())
    {
        if(is_array($folders))
        {
            foreach($folders as $f=>$folder)
            {
                $path = Self::PLUGIN_PATH.$folder.'/';
                if(is_dir($path)){
                    if ($dh = opendir($path)) {
                        while (($file = readdir($dh)) !== false){
                            if (is_dir($path . $file))
                            {
                                if($file !=='.' && $file !=='..')
                                {
                                    $this->getPlugins(array($folder.'/'.$file));
                                }
                            }
                            else{
                                if($file !=='.' && $file !=='..')
                                {
                                    $ext = explode(".",$file);
                                    $ext = array_pop($ext);
                                    switch($ext)
                                    {
                                        case 'css':
                                            $this->_plugginscss[] = Self::PLUGIN_PATH .$folder.'/'.$file;
                                            break;
                                        case 'js':
                                            $this->_plugginsjs[] = Self::PLUGIN_PATH .$folder.'/'.$file;
                                            break;
                                    }
                                }
                            }
                        }
                        closedir($dh);
                    }
                }else{
                    echo "File not found => '$path'".'<br/>';
                }
            }
        }else{
            throw new Exception('Error In plugins, not an array');
        }
    }

    public function setTemplates(array $tmp,$folder,$backend=true)
    {
        $route = ($backend !== false)
            ? self::LAYOUT_PATH .'/backend/'.$folder
            : self::LAYOUT_PATH .'/frontend/'.$folder;

        if(is_array($tmp) && count($tmp)){
            for($i=0; $i < count($tmp); $i++){

                $this->templates[] = $route . DS . $tmp[$i] . '.php';
            }

        }
        else {
            throw new Exception('Error setting Template');
        }
    }


    public function loadTemplate($template,$folder,$backend=true)
    {

        $route = ($backend !== false)
            ? self::LAYOUT_PATH .'/backend/'.$folder
            : self::LAYOUT_PATH .'/frontend/'.$folder;

            include_once $route . DS . $template. '.php';
    }

    public function pr($array)
    {
        if(is_array($array))
        {
            echo '<pre>';
                print_r($array);
            echo '</pre>';
        }else{
            echo '<pre>';
                return var_dump($array);
            echo '</pre>';
        }
    }



}