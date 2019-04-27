<?php
namespace App\Modules\Admin\Controllers;

defined("APPPATH") OR die("Access denied");

use Core\Controller,
    Core\Session;
use App\Models\User;
use App\Models\Ine;
use App\Models\XlsCordinador;

class IndexController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        Session::accesoEstricto(array('1'=>'1'));
    }


    public function index()
    {
        if(Session::get('allUsers'))
        {
            Session::destroy('allUsers');
        }

        if(Session::get('page'))
        {
            $pagina=Session::get('page');
        }else{
            $pagina=1;
        }

        $allCoordinadores = Ine::where('es_coordinador', '=', true)->select("consecutivo","nombre_completo","clave_de_elector")->get()->toArray();
        $this->view->set('allCoordinadores',$allCoordinadores);

        $this->view->setJs(array('admin'));
        $allUsers = array();
        $this->view->set('allUsers',$allUsers);
        $this->view->setTemplates(array('index'),'Admin');
        $this->view->render('index');
    }

    public function promovidos()
    {
        if(Session::get('allUsers'))
        {
            Session::destroy('allUsers');
        }

        if(Session::get('page'))
        {
            $pagina=Session::get('page');
        }else{
            $pagina=1;
        }

        $this->view->setJs(array('admin'));
        $allUsers = array();
        $this->view->set('allUsers',$allUsers);
        $this->view->setTemplates(array('promovidos'),'Promovidos');
        $this->view->render('index');
    }


    public function migrate_csv()
    {
        $path = ROOT.'/Public/csv/ines.csv';
        $html = '';
        $r=0;
        $search = array("$", ",");
        if (($file = fopen($path, "r")) !== FALSE)
        {
          
            while (($ine = fgetcsv($file, 1000,';')) !== FALSE)
            {
                if($r!==0)
                {
                    $IneExist = Ine::where('clave_de_elector', 'like', $ine[5])->get()->toArray();
                    if(!$IneExist)
                    {
                        $dataINE = new Ine;
                        $dataINE->paterno = $ine[1];
                        $dataINE->materno = $ine[2];
                        $dataINE->nombres = $ine[3];
                        $dataINE->nombre_completo = $ine[4];
                        $dataINE->clave_de_elector = $ine[5];
                        $dataINE->folio = $ine[6];
                        $dataINE->estado = $ine[7];
                        $dataINE->municipio = $ine[8];
                        $dataINE->seccion = $ine[9];
                        $dataINE->casilla = $ine[10];
                        $dataINE->tipo_dextraordinaria_contigua_casilla = $ine[11];
                        $dataINE->casilla_voto = $ine[12];
                        $dataINE->ocupacion = $ine[13];
                        $dataINE->direccion1 = $ine[14];
                        $dataINE->direccion2 = $ine[15];
                        $dataINE->direccion3 = $ine[16];
                        $dataINE->colonia = $ine[17];
                        $dataINE->cod_pos = $ine[18];
                        $dataINE->direccion = $ine[19];
                        $dataINE->save();
                    }
                }
                $r++;
            }
        }   
        /*$response = array('html'=>$html);
        echo json_encode($response);*/
    }

    public function export_xls()
    {

        $Coordinador = Ine::where('consecutivo', '=', $_SESSION['coordinador_id'])->select("consecutivo","nombre_completo","clave_de_elector")->get()->toArray();


        $export_data = Ine::select('consecutivo','coordinador_id','paterno','materno','nombres',
                                  'nombre_completo','clave_de_elector','folio',
                                  'estado','municipio','seccion','casilla',
                                  'tipo_dextraordinaria_contigua_casilla',
                                  'casilla_voto','ocupacion','direccion1', 'direccion2',
                                  'direccion3', 'colonia', 'cod_pos','direccion')
                            ->where('coordinador_id', '=', $_SESSION['coordinador_id'])
                            ->get()->toArray();

        $export_data = XlsCordinador::select(
            'clave_de_elector'
            ,'paterno'
            ,'materno'
            ,'nombres'
            ,'nombre_completo'
            ,'folio'
            ,'estado'
            ,'municipio'
            ,'seccion'
            ,'casilla'
            ,'tipo_dextraordinaria_contigua_casilla'
            ,'casilla_voto'
            ,'ocupacion'
            ,'ocupacion_actual'
            ,'direccion1'
            ,'direccion2'
            ,'direccion3'
            ,'colonia'
            ,'cod_pos'
            ,'direccion'
            ,'telefono'
            ,'tiene_whatsapp'
            ,'facebook'
            ,'correo'
            ,'lugar_trabajo'
            ,'horario_disponible'
            ,'fecha_grabo'
            ,'status'
            ,'edad'
            ,'propuestas_ciudadanas'
            ,'coordinador'
            ,'seccional'
            ,'promotor','folio_promotor'  )
            ->where('coordinador_id', '=', $_SESSION['coordinador_id'])
            ->where('es_promovido','=',true)
            ->get()->toArray();

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

        exit;
    }

    public function import()
    {
        $this->view->getPlugins(array('bootstrap-fileinput'));
        $this->view->setJs(array('import'));
        $this->view->render('import');
    }   

}