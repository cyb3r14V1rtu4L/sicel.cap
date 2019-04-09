<?php

namespace Core;

class Session
{
    public static function init()
    {
        session_start();
    }

    public static function destroy($clave = false)
    {
        if($clave){
            if(is_array($clave)){
                for($i = 0; $i < count($clave); $i++){
                    if(isset($_SESSION[$clave[$i]])){
                        unset($_SESSION[$clave[$i]]);
                    }
                }
            }
            else{
                if(isset($_SESSION[$clave])){
                    unset($_SESSION[$clave]);
                }
            }
        }
        else{
            session_destroy();
        }
    }

    public static function set($clave, $valor)
    {
        if(!empty($clave))
            $_SESSION[$clave] = $valor;
    }

    public static function get($clave)
    {
        if(isset($_SESSION[$clave]))
            return $_SESSION[$clave];
    }


    public static function validate()
    {
        if(!Session::get('autenticado'))
        {
            header('location: /login');
            exit;
        }

    }


    public static function acceso($level)
    {
        if(!Session::get('autenticado') && Session::get('lock')){
            header('location:' . BASE_URL . 'login/lockscreen');
            exit;
        }elseif(!Session::get('autenticado')){
            header('location:' . BASE_URL . 'access/type/7070');
            exit;
        }

        Session::tiempo();

        if(Session::getLevel($level) > Session::getLevel(Session::get('role'))){
            header('location:' . BASE_URL . 'access/type/5050/');
            exit;
        }
    }



    public static function getLevel($level)
    {
        $role['admin'] = 3;
        $role['verifier'] = 2;
        $role['user'] = 1;

        if(!array_key_exists($level, $role)){
            throw new Exception('Error de acceso');
        }
        else{
            return $role[$level];
        }
    }

    public static function accesoEstricto(array $level)
    {
        if(!Session::get('autenticado') && Session::get('lock')){
            header('location:' . BASE_URL . 'login/lockscreen');
            exit;
        }elseif(!Session::get('autenticado')){
            header('location:' . BASE_URL . 'access/type/7070');
            exit;
        }

        Session::tiempo();

        /*if($noAdmin == false){
            if(Session::get('role') == 'admin'){
                return;
            }
        }*/



        if(count($level)){
            if(in_array(Session::get('type'), $level)){
                return;
            }
        }else {

            header('location:' . BASE_URL . 'access/type/5050');
        }
    }

    public static function accesoViewEstricto(array $level, $noAdmin = false)
    {
        if(!Session::get('autenticado')){
            return false;
        }

        if($noAdmin == false){
            if(Session::get('level') == 'admin'){
                return true;
            }
        }

        if(count($level)){
            if(in_array(Session::get('role'), $level)){
                return true;
            }
        }
        return false;
    }

    public static function tiempo()
    {
        if(!Session::get('time') || !defined('SESSION_TIME')){
            throw new Exception('No se ha definido el tiempo de sesion');
        }

        if(SESSION_TIME == 0){
            return;
        }

        if(time() - Session::get('time') > (SESSION_TIME * 60)){
            Session::destroy();
            header('location:' . BASE_URL . 'access/type/8080');
        }
        else{
            Session::set('time', time());
        }
    }

    public static function setMessage($msg,$type)
    {
        $m['message']=$msg;
        $m['type']=$type;

        Session::set('message',$m);
    }

    public static function message()
    {
        if(Session::get('message'))
        {
            $m=Session::get('message');
            echo '<script>
                    $(document).ready(function(){
                        showMessage("'.$m['message'].'","'.$m['type'].'");
                    });
                 </script>';
            Session::destroy('message');
        }
        return false;
    }



}