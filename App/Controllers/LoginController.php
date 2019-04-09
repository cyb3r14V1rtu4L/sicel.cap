<?php

namespace App\Controllers;


defined("APPPATH") OR die("Access denied");

use App\Models\User;
use Core\Controller;
use Core\Session;

class LoginController extends Controller  {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        if ($this->getInt('submitButton') == 1) {

            if (!$this->getPostParam('email')) {
                $this->view->set('error', 'Enter an email');
                $this->view->render('index');
                exit;
            }

            if (!$this->getSql('password')) {
                $this->view->set('error', 'Enter a password');
                $this->view->render('index');
                exit;
            }

            $username = $this->getPostParam('email');
            $password = sha1($this->getSql('password'));

            if (!$user = User::where(array('username' => $username, 'password' => $password))->first()) {
                $this->view->set('error', 'User and/or password incorrect');
                $this->view->render('index');
                exit;
            }

            Session::set('autenticado', true);
            Session::set('first_name', $user->name);
            Session::set('username', $user->user);
            Session::set('user_id', $user->user_id);
            Session::set('type', $user->type);
            Session::set('time', time());

            if ($user->is_supervisor == 1) {
                Session::set('supervisor', $user->is_supervisor);
            }

            switch ($user->type) {
                case 2:
                    $this->redireccionar('admin');
                    break;
            }
        }
        $this->view->render('index');
    }
}
