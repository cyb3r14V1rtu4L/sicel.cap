<?php
namespace App\Modules\Admin\Controllers;

defined("APPPATH") OR die("Access denied");

use Core\Controller,
    Core\Session;
use App\Models\User;
use App\Models\Ine;


class PromotoresController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        Session::accesoEstricto(array('1'=>'1'));
    }


    public function index()
    {
        $this->view->setJs(array('admin'));
        $allUsers = array();
        $this->view->set('allUsers',$allUsers);
        $allSeccionals = array();
        $this->view->set('allSeccionals',$allSeccionals);
        $this->view->setTemplates(array('promotores'),'Admin');
        $this->view->render('index');
    }



    public function export_xls()
    {
        $export_data = Ine::select('consecutivo','paterno','materno','nombres',
                                  'nombre_completo','clave_de_elector','folio',
                                  'estado','municipio','seccion','casilla',
                                  'tipo_dextraordinaria_contigua_casilla',
                                  'casilla_voto','ocupacion','direccion1', 'direccion2',
                                  'direccion3', 'colonia', 'cod_pos','direccion')
                            ->where('ine_xtr', '=', 1)->get()->toArray();

        $fileName = "INE_DATA" .date("Hms") . ".xls";
 
        if ($export_data) {
            header("Content-Disposition: attachment; filename=\"$fileName\"");
            header("Content-Type: application/vnd.ms-excel");
        
            $flag = false;
            foreach($export_data as $row) {
                if(!$flag) {
                    // display column names as first row
                    echo implode("\t", array_keys($row)) . "\n";
                    $flag = true;
                }
                echo implode("\t", array_values($row)) . "\n";
            }
            exit;           
        }
    }

    public function import()
    {
        $this->view->getPlugins(array('bootstrap-fileinput'));
        $this->view->setJs(array('import'));
        $this->view->render('import');
    }   

}