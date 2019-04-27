<?php

namespace App\Controllers;


defined("APPPATH") OR die("Access denied");

use App\Models\User;
use App\Models\Ine;

use Core\Controller;
use Core\Session;

class AjaxController extends Controller  {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){}

    public function ineExtract()
    {
        $Ine = Ine::find($_POST['consecutivo']);
        $Ine->ine_xtr = $_POST['xls_xtr'];
        $Ine->save();

        $response_data = array('result' => $_POST);
        echo json_encode($response_data);
    }

    public function ineCoordinadores()
    {

        $Ine = new Ine;

        if($_POST['es_nuevo'] == 0){
            $Ine->clave_de_elector = $_POST['clave_de_elector'];
            $Ine->es_coordinador = 1;

        }else{
            $Ine = Ine::find($_POST['consecutivo']);
            $Ine->es_coordinador = $_POST['es_coordinador'];

        }

        $Ine->municipio = (!empty($_POST['municipio_txt'])) ? $_POST['municipio_txt'] : null;
        $Ine->fecha_grabo = (!empty($_POST['fecha_grabo'])) ? $_POST['fecha_grabo'] : null;
        $Ine->seccion = (!empty($_POST['seccion'])) ? $_POST['seccion'] : null;
        $Ine->paterno = (!empty($_POST['paterno'])) ? $_POST['paterno'] : null;
        $Ine->materno = (!empty($_POST['materno']))? $_POST['materno'] : null;
        $Ine->nombres = (!empty($_POST['nombres']))? $_POST['nombres'] : null;

        if(!empty($Ine->paterno) && !empty($Ine->materno) && !empty($Ine->nombres)) {
            $Ine->nombre_completo = $Ine->paterno.' '.$Ine->materno.' '.$Ine->nombres;
        }else{
            $Ine->nombre_completo = $Ine->paterno.' '.$Ine->nombres;
        }

        $Ine->edad = (!empty($_POST['edad'])) ? $_POST['edad'] : null;
        $Ine->direccion = (!empty($_POST['direccion_actual'])) ? $_POST['direccion_actual'] : null;
        $Ine->telefono = (!empty($_POST['telefono'])) ? $_POST['telefono'] : null;
        $Ine->facebook = (!empty($_POST['facebook'])) ? $_POST['facebook']: null;
        $Ine->correo = (!empty($_POST['correo'])) ? $_POST['correo']: null;
        $Ine->ocupacion = (!empty($_POST['ocupacion'])) ? $_POST['ocupacion']: null;
        $Ine->lugar_trabajo = (!empty($_POST['lugar_trabajo'])) ? $_POST['lugar_trabajo']: null;
        $Ine->horario_disponible = (!empty($_POST['horario_disponible'])) ? $_POST['horario_disponible']: null;
        $Ine->es_coordinador = (!empty($_POST['es_coordinador'])) ? $_POST['es_coordinador']: null;
        $Ine->comentarios = (!empty($_POST['comentarios'])) ? $_POST['comentarios']: null;
        $Ine->save();

        $response_data = array('result' => $_POST);
        echo json_encode($response_data);
    }

    public function ineSeccionales()
    {

        $Ine = new Ine;

        if($_POST['es_nuevo'] == 0){
            $Ine->clave_de_elector = $_POST['clave_de_elector'];
            $Ine->es_seccional = 1;

        }else{
            $Ine = Ine::find($_POST['consecutivo']);
            $Ine->es_seccional = $_POST['es_seccional'];

        }

        $Ine->municipio = (!empty($_POST['municipio_txt'])) ? $_POST['municipio_txt'] : null;
        $Ine->fecha_grabo = (!empty($_POST['fecha_grabo'])) ? $_POST['fecha_grabo'] : null;
        $Ine->seccion = (!empty($_POST['seccion'])) ? $_POST['seccion'] : null;
        $Ine->paterno = (!empty($_POST['paterno'])) ? $_POST['paterno'] : null;
        $Ine->materno = (!empty($_POST['materno']))? $_POST['materno'] : null;
        $Ine->nombres = (!empty($_POST['nombres']))? $_POST['nombres'] : null;

        if(!empty($Ine->paterno) && !empty($Ine->materno) && !empty($Ine->nombres)) {
            $Ine->nombre_completo = $Ine->paterno.' '.$Ine->materno.' '.$Ine->nombres;
        }else{
            $Ine->nombre_completo = $Ine->paterno.' '.$Ine->nombres;
        }

        $Ine->edad = (!empty($_POST['edad'])) ? $_POST['edad'] : null;
        $Ine->direccion = (!empty($_POST['direccion_actual'])) ? $_POST['direccion_actual'] : null;
        $Ine->telefono = (!empty($_POST['telefono'])) ? $_POST['telefono'] : null;
        $Ine->facebook = (!empty($_POST['facebook'])) ? $_POST['facebook']: null;
        $Ine->correo = (!empty($_POST['correo'])) ? $_POST['correo']: null;
        $Ine->ocupacion = (!empty($_POST['ocupacion'])) ? $_POST['ocupacion']: null;
        $Ine->lugar_trabajo = (!empty($_POST['lugar_trabajo'])) ? $_POST['lugar_trabajo']: null;
        $Ine->horario_disponible = (!empty($_POST['horario_disponible'])) ? $_POST['horario_disponible']: null;
        $Ine->seccional_id = (!empty($_POST['seccional_id'])) ? $_POST['seccional_id']: null;
        $Ine->comentarios = (!empty($_POST['comentarios'])) ? $_POST['comentarios']: null;
        $Ine->coordinador_id = (!empty($_POST['coordinador_id'])) ? $_POST['coordinador_id']: null;
        $result = $Ine->save();

        $response_data = array('result' => $result, 'data'=> $_POST);
        echo json_encode($response_data);
    }

    public function inePromotores()
    {

        $Ine = new Ine;

        if($_POST['es_nuevo'] == 0){
            $Ine->clave_de_elector = $_POST['clave_de_elector'];
            $Ine->es_promotor = 1;
        }else{
            $Ine = Ine::find($_POST['consecutivo']);
            $Ine->es_promotor = $_POST['es_promotor'];


        }

        $Ine->municipio = (!empty($_POST['municipio_txt'])) ? $_POST['municipio_txt'] : null;
        $Ine->fecha_grabo = (!empty($_POST['fecha_grabo'])) ? $_POST['fecha_grabo'] : null;
        $Ine->seccion = (!empty($_POST['seccion'])) ? $_POST['seccion'] : null;
        $Ine->paterno = (!empty($_POST['paterno'])) ? $_POST['paterno'] : null;
        $Ine->materno = (!empty($_POST['materno']))? $_POST['materno'] : null;
        $Ine->nombres = (!empty($_POST['nombres']))? $_POST['nombres'] : null;

        if(!empty($Ine->paterno) && !empty($Ine->materno) && !empty($Ine->nombres)) {
            $Ine->nombre_completo = $Ine->paterno.' '.$Ine->materno.' '.$Ine->nombres;
        }else{
            $Ine->nombre_completo = $Ine->paterno.' '.$Ine->nombres;
        }

        $Ine->edad = (!empty($_POST['edad'])) ? $_POST['edad'] : null;
        $Ine->direccion = (!empty($_POST['direccion_actual'])) ? $_POST['direccion_actual'] : null;
        $Ine->telefono = (!empty($_POST['telefono'])) ? $_POST['telefono'] : null;
        $Ine->facebook = (!empty($_POST['facebook'])) ? $_POST['facebook']: null;
        $Ine->correo = (!empty($_POST['correo'])) ? $_POST['correo']: null;
        $Ine->ocupacion = (!empty($_POST['ocupacion'])) ? $_POST['ocupacion']: null;
        $Ine->lugar_trabajo = (!empty($_POST['lugar_trabajo'])) ? $_POST['lugar_trabajo']: null;
        $Ine->horario_disponible = (!empty($_POST['horario_disponible'])) ? $_POST['horario_disponible']: null;
        $Ine->seccional_id = (!empty($_POST['seccional_id'])) ? $_POST['seccional_id']: null;
        $Ine->coordinador_id = (!empty($_POST['coordinador_id'])) ? $_POST['coordinador_id']: null;

        $Ine->comentarios = (!empty($_POST['comentarios'])) ? $_POST['comentarios']: null;
        $Ine->save();

        $response_data = array('result' => $_POST);
        echo json_encode($response_data);
    }


    public function inePromovidos()
    {

        $Ine = new Ine;

        if($_POST['es_nuevo'] == 0){
            $Ine->clave_de_elector = $_POST['clave_de_elector'];
            $Ine->es_promovido = 1;
        }else{
            $Ine = Ine::find($_POST['consecutivo']);
            $Ine->es_promovido = $_POST['es_promovido'];


        }

        $Ine->fecha_grabo = date("Y-m-d");
        $Ine->paterno = (!empty($_POST['paterno'])) ? $_POST['paterno'] : null;
        $Ine->materno = (!empty($_POST['materno']))? $_POST['materno'] : null;
        $Ine->nombres = (!empty($_POST['nombres']))? $_POST['nombres'] : null;

        if(!empty($Ine->paterno) && !empty($Ine->materno) && !empty($Ine->nombres)) {
            $Ine->nombre_completo = $Ine->paterno.' '.$Ine->materno.' '.$Ine->nombres;
        }else{
            $Ine->nombre_completo = $Ine->paterno.' '.$Ine->nombres;
        }

        $Ine->seccion = (!empty($_POST['seccion'])) ? $_POST['seccion'] : null;
        $Ine->status = (!empty($_POST['status'])) ? $_POST['status'] : null;
        $Ine->telefono = (!empty($_POST['telefono'])) ? $_POST['telefono'] : null;
        $Ine->tiene_wsp = (!empty($_POST['tiene_wsp'])) ? $_POST['tiene_wsp']: null;
        $Ine->promotor_id = (!empty($_POST['promotor_id'])) ? $_POST['promotor_id']: null;
        $Ine->coordinador_id = (!empty($_POST['coordinador_id'])) ? $_POST['coordinador_id']: null;
        $Ine->seccional_id = (!empty($_POST['seccional_id'])) ? $_POST['seccional_id']: null;
        $Ine->direccion = (!empty($_POST['direccion_actual'])) ? $_POST['direccion_actual'] : null;
        $Ine->comentarios = (!empty($_POST['comentarios'])) ? $_POST['comentarios'] : null;

        $Ine->save();

        $response_data = array('result' => $_POST);
        echo json_encode($response_data);
    }


    public function activateUser()
    {
        $User = User::find($_POST['user_id']);
        $User->active = $_POST['active'];
        $User->save();

        $response_data = array('result' => $_POST);
        echo json_encode($response_data);
    }

    public function remoteUser()
    {
        $User = User::find($_POST['user_id']);
        $User->remote = $_POST['remote'];
        $User->save();

        $response_data = array('result' => $_POST);
        echo json_encode($response_data);
    }

    public function searchUser()
    {
        $html = '';
        if(strlen($_POST['search'])>4)
        {

            $allUsers = Ine::where('consecutivo', 'like', $_POST['search'] .'%')
                ->orWhere('nombre_completo', 'like', $_POST['search'] .'%')
                ->orWhere('clave_de_elector', 'like', $_POST['search'] .'%')
                ->get()->toArray();

            $allUsers = (!empty($allUsers)) ? $allUsers : 'INE NO ENCONTRADA';
            Session::set('allUsers',$allUsers);
            //$this->view->allUsers = $allUsers;
            ob_start();
            $this->view->loadTemplate('users-data','Admin');
            $html=ob_get_contents();
            ob_end_clean();
        
        }else{
            $allUsers = 'INE NO ENCONTRADA';
            Session::set('allUsers',$allUsers);
        }       
        
        $response_data=array('html'=>$html);
        echo json_encode($response_data);
    }

    public function searchCoordinadores()
    {
        $html = '';
        if(strlen($_POST['search'])>4)
        {

            $allUsers = Ine::where('consecutivo', 'like', $_POST['search'] .'%')
                ->orWhere('nombre_completo', 'like', $_POST['search'] .'%')
                ->orWhere('clave_de_elector', 'like', $_POST['search'] .'%')
                ->get()->toArray();

            $allUsers = (!empty($allUsers)) ? $allUsers : 'INE NO ENCONTRADA';
            Session::set('allUsers',$allUsers);
            Session::set('ine',$_POST['search']);
            //$this->view->allUsers = $allUsers;
            ob_start();
            $this->view->loadTemplate('coordinadores-users-data','Admin');
            $html=ob_get_contents();
            ob_end_clean();

        }else{
            $allUsers = 'INE NO ENCONTRADA';
            Session::set('allUsers',$allUsers);
        }

        $response_data=array('html'=>$html);
        echo json_encode($response_data);
    }

    public function searchSeccionales()
    {
        $html = '';
        if(strlen($_POST['search'])>4)
        {

            $allUsers = Ine::where('consecutivo', 'like', $_POST['search'] .'%')
                ->orWhere('nombre_completo', 'like', $_POST['search'] .'%')
                ->orWhere('clave_de_elector', 'like', $_POST['search'] .'%')
                ->get()->toArray();

            $allUsers = (!empty($allUsers)) ? $allUsers : 'INE NO ENCONTRADA';
            Session::set('allUsers',$allUsers);
            Session::set('ine',$_POST['search']);
            //$this->view->allUsers = $allUsers;
            ob_start();
            $this->view->loadTemplate('seccionales-users-data','Admin');
            $html=ob_get_contents();
            ob_end_clean();

        }else{
            $allUsers = 'INE NO ENCONTRADA';
            Session::set('allUsers',$allUsers);
        }

        $response_data=array('html'=>$html);
        echo json_encode($response_data);
    }


    public function searchPromotores()
    {
        $html = '';
        if(strlen($_POST['search'])>4)
        {
            $allSeccionals = Ine::where('coordinador_id', '=', Session::get('coordinador_id'))->select("consecutivo","nombre_completo","clave_de_elector")->get()->toArray();
            $allUsers = Ine::where('consecutivo', 'like', $_POST['search'] .'%')
                ->orWhere('nombre_completo', 'like', $_POST['search'] .'%')
                ->orWhere('clave_de_elector', 'like', $_POST['search'] .'%')
                ->get()->toArray();

            $allUsers = (!empty($allUsers)) ? $allUsers : 'INE NO ENCONTRADA';
            Session::set('allUsers',$allUsers);
            Session::set('allSeccionals',$allSeccionals);
            Session::set('ine',$_POST['search']);



            //$this->view->allUsers = $allUsers;
            ob_start();
            $this->view->loadTemplate('promotores-users-data','Admin');
            $html=ob_get_contents();
            ob_end_clean();

        }else{
            $allUsers = 'INE NO ENCONTRADA';
            Session::set('allUsers',$allUsers);
        }

        $response_data=array('html'=>$html);
        echo json_encode($response_data);
    }

    public function searchPromovidos()
    {
        $html = '';
        if(strlen($_POST['search'])>4)
        {


            $allPromotores = Ine::where('es_promotor', '=', true)
                                ->where('seccional_id','=', $this->getPostParam('seccional_id'))
                                ->select("consecutivo","nombre_completo","clave_de_elector")
                                ->get()
                                ->toArray();

            $allUsers = Ine::where('consecutivo', 'like', $_POST['search'] .'%')
                ->orWhere('nombre_completo', 'like', $_POST['search'] .'%')
                ->orWhere('clave_de_elector', 'like', $_POST['search'] .'%')
                ->get()->toArray();

            $allUsers = (!empty($allUsers)) ? $allUsers : 'INE NO ENCONTRADA';
            Session::set('allUsers',$allUsers);
            Session::set('allPromotores',$allPromotores);
            Session::set('ine',$_POST['search']);
            //$this->view->allUsers = $allUsers;
            ob_start();
            $this->view->loadTemplate('promovidos-users-data','Admin');
            $html=ob_get_contents();
            ob_end_clean();

        }else{
            $allUsers = 'INE NO ENCONTRADA';
            Session::set('allUsers',$allUsers);
        }

        $response_data=array('html'=>$html);
        echo json_encode($response_data);
    }


    /*
     * Update Functions
     * */

    public function ineSeccionalesUp()
    {
        $Ine = Ine::find($_POST['consecutivo']);

        $Ine->municipio = (!empty($_POST['municipio_txt'])) ? $_POST['municipio_txt'] : null;
        $Ine->fecha_grabo = (!empty($_POST['fecha_grabo'])) ? $_POST['fecha_grabo'] : null;
        $Ine->seccion = (!empty($_POST['seccion'])) ? $_POST['seccion'] : null;
        $Ine->paterno = (!empty($_POST['paterno'])) ? $_POST['paterno'] : null;
        $Ine->materno = (!empty($_POST['materno']))? $_POST['materno'] : null;
        $Ine->nombres = (!empty($_POST['nombres']))? $_POST['nombres'] : null;

        if(!empty($Ine->paterno) && !empty($Ine->materno) && !empty($Ine->nombres)) {
            $Ine->nombre_completo = $Ine->paterno.' '.$Ine->materno.' '.$Ine->nombres;
        }else{
            $Ine->nombre_completo = $Ine->paterno.' '.$Ine->nombres;
        }

        $Ine->edad = (!empty($_POST['edad'])) ? $_POST['edad'] : null;
        $Ine->direccion = (!empty($_POST['direccion_actual'])) ? $_POST['direccion_actual'] : null;
        $Ine->telefono = (!empty($_POST['telefono'])) ? $_POST['telefono'] : null;
        $Ine->facebook = (!empty($_POST['facebook'])) ? $_POST['facebook']: null;
        $Ine->correo = (!empty($_POST['correo'])) ? $_POST['correo']: null;
        $Ine->ocupacion = (!empty($_POST['ocupacion'])) ? $_POST['ocupacion']: null;
        $Ine->lugar_trabajo = (!empty($_POST['lugar_trabajo'])) ? $_POST['lugar_trabajo']: null;
        $Ine->horario_disponible = (!empty($_POST['horario_disponible'])) ? $_POST['horario_disponible']: null;
        $Ine->comentarios = (!empty($_POST['comentarios'])) ? $_POST['comentarios']: null;
        $Ine->save();

        $response_data = array('result' => $_POST);
        echo json_encode($response_data);
    }

    public function inePromotoresUp()
    {
        $Ine = Ine::find($_POST['consecutivo']);

        $Ine->municipio = (!empty($_POST['municipio_txt'])) ? $_POST['municipio_txt'] : null;
        $Ine->fecha_grabo = (!empty($_POST['fecha_grabo'])) ? $_POST['fecha_grabo'] : null;
        $Ine->seccion = (!empty($_POST['seccion'])) ? $_POST['seccion'] : null;
        $Ine->paterno = (!empty($_POST['paterno'])) ? $_POST['paterno'] : null;
        $Ine->materno = (!empty($_POST['materno']))? $_POST['materno'] : null;
        $Ine->nombres = (!empty($_POST['nombres']))? $_POST['nombres'] : null;

        if(!empty($Ine->paterno) && !empty($Ine->materno) && !empty($Ine->nombres)) {
            $Ine->nombre_completo = $Ine->paterno.' '.$Ine->materno.' '.$Ine->nombres;
        }else{
            $Ine->nombre_completo = $Ine->paterno.' '.$Ine->nombres;
        }

        $Ine->edad = (!empty($_POST['edad'])) ? $_POST['edad'] : null;
        $Ine->direccion = (!empty($_POST['direccion_actual'])) ? $_POST['direccion_actual'] : null;
        $Ine->telefono = (!empty($_POST['telefono'])) ? $_POST['telefono'] : null;
        $Ine->facebook = (!empty($_POST['facebook'])) ? $_POST['facebook']: null;
        $Ine->correo = (!empty($_POST['correo'])) ? $_POST['correo']: null;
        $Ine->ocupacion = (!empty($_POST['ocupacion'])) ? $_POST['ocupacion']: null;
        $Ine->lugar_trabajo = (!empty($_POST['lugar_trabajo'])) ? $_POST['lugar_trabajo']: null;
        $Ine->horario_disponible = (!empty($_POST['horario_disponible'])) ? $_POST['horario_disponible']: null;
        $Ine->seccional_id = (!empty($_POST['seccional_id'])) ? $_POST['seccional_id']: null;
        $Ine->comentarios = (!empty($_POST['comentarios'])) ? $_POST['comentarios']: null;
        $Ine->save();

        $response_data = array('result' => $_POST);
        echo json_encode($response_data);
    }


    public function inePromovidosUp()
    {
        $Ine = Ine::find($_POST['consecutivo']);

        $Ine->fecha_grabo = date("Y-m-d");
        $Ine->paterno = (!empty($_POST['paterno'])) ? $_POST['paterno'] : null;
        $Ine->materno = (!empty($_POST['materno']))? $_POST['materno'] : null;
        $Ine->nombres = (!empty($_POST['nombres']))? $_POST['nombres'] : null;

        if(!empty($Ine->paterno) && !empty($Ine->materno) && !empty($Ine->nombres)) {
            $Ine->nombre_completo = $Ine->paterno.' '.$Ine->materno.' '.$Ine->nombres;
        }else{
            $Ine->nombre_completo = $Ine->paterno.' '.$Ine->nombres;
        }

        $Ine->clave_de_elector = (!empty($_POST['clave_de_elector'])) ? $_POST['clave_de_elector'] : null;
        $Ine->seccion = (!empty($_POST['seccion'])) ? $_POST['seccion'] : null;
        $Ine->status = (!empty($_POST['status'])) ? $_POST['status'] : null;
        $Ine->telefono = (!empty($_POST['telefono'])) ? $_POST['telefono'] : null;
        $Ine->tiene_wsp = (!empty($_POST['tiene_wsp'])) ? $_POST['tiene_wsp']: null;
        $Ine->promotor_id = (!empty($_POST['promotor_id'])) ? $_POST['promotor_id']: null;
        $Ine->direccion = (!empty($_POST['direccion_actual'])) ? $_POST['direccion_actual'] : null;

        $Ine->save();

        $response_data = array('result' => $_POST);
        echo json_encode($response_data);
    }


    /*
    * Update Functions
    * */


    public function mostrarXLS()
    {
        $coordinador_id = $_POST['coordinador_id'];
        $allUsers = Ine::where('coordinador_id', '=', $coordinador_id)->get()->toArray();

        $allUsers = (!empty($allUsers)) ? $allUsers : 'INE NO ENCONTRADA';
        Session::set('allUsers',$allUsers);
        //$this->view->allUsers = $allUsers;
        ob_start();
        $this->view->loadTemplate('users-data','Admin');
        $html=ob_get_contents();
        ob_end_clean();
        
        $response_data=array('html'=>$html);
        echo json_encode($response_data);
    }

    function setPromotor() {
        Session::set('promotor_id', $_POST['promotor_id']);
        $response_data=array('promotor_id'=> Session::get('promotor_id'));
        echo json_encode($response_data);
    }

    function setCoordinador() {
        Session::set('coordinador_id', $_POST['coordinador_id']);
        #$this->pr($_SESSION['coordinador_id']);

        $allSeccionals = Ine::where('es_seccional', '=', true)->where('coordinador_id', '=', Session::get('coordinador_id'))->select("consecutivo","nombre_completo","clave_de_elector")->get()->toArray();
        Session::set('allSeccionals',$allSeccionals);

        ob_start();
        $this->view->loadTemplate('seccionals-data','Admin');
        $html=ob_get_contents();
        ob_end_clean();

        $response_data=array('coordinador_id'=> Session::get('coordinador_id'),'html'=>$html);

        echo json_encode($response_data);
    }

    /*public function mostrarSeccionales()
    {
        $allUsers = Ine::where('es_seccional', '=', 1)->get()->toArray();

        $allUsers = (!empty($allUsers)) ? $allUsers : 'INE NO ENCONTRADA';
        Session::set('allUsers',$allUsers);
        //$this->view->allUsers = $allUsers;
        ob_start();
        $this->view->loadTemplate('seccionales-users-data','Admin');
        $html=ob_get_contents();
        ob_end_clean();

        $response_data=array('html'=>$html);
        echo json_encode($response_data);
    }*/
}