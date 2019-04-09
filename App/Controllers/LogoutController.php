<?php
/**
 * Created by PhpStorm.
 * User: Cyberio
 * Date: 30/12/16
 * Time: 01:43 PM
 */
namespace App\Controllers;

use Core\Controller;
use Core\Session;

class LogoutController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        Session::destroy();
        $this->redireccionar('login');
    }

}