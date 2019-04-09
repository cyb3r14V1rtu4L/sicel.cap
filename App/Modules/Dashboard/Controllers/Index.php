<?php

namespace App\Modules\Dashboard\Controllers;

defined("APPPATH") OR die("Access denied");

use Core\Session;

class Index extends \Core\Controller
{
    public function __construct()
    {
        parent::__construct();
        Session::accesoEstricto(array('customer'));
    }


    public function index()
    {

        $this->view->render('index');
    }
}