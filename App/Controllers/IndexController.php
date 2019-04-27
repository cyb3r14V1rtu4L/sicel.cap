<?php

namespace App\Controllers;

defined("APPPATH") OR die("Access denied");

use App\Models\Ine;
use Core\Controller;


class IndexController extends Controller{

    public function __construct()
    {
        parent::__construct();
        //$this->properties = new PropertiesModel();
    }

    public function index()
    {
        $allCoordinadores = Ine::where('es_coordinador', '=', true)->select("consecutivo","nombre_completo","clave_de_elector")->get()->toArray();
        $this->view->set('allCoordinadores',$allCoordinadores);

        $this->view->render('index');

    }


}