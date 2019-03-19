<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diagramas extends MX_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('tbl_usuario','obj_usuario');
        $this->load->model('tbl_sensorParser','obj_sensorParser');

        if($this->session->userdata('logged') != 'true'){
           redirect('login');
        }

    }
	
	public function index(){
        $this->load->tmp_admin->render('diagramas_view.php','diagramas');
	}

    public function get_resultados(){
      

        $datos = $this->obj_sensorParser->get_all_sensorParser(40,'TCA');
        $query = $datos->query;
        $datos=$datos->result();

        $labels = array();    
        $datosDiagrama = array(); 

        foreach ($datos as $key => $value) {
            array_push($labels, substr($value->timestamp, 10,9));
            array_push($datosDiagrama, round($value->value, 2));
        }

        $datasets = array();
        array_push($datasets, array('label' => "Primero", 'fillColor' => "rgba(255, 204, 0,0.2)","strokeColor" => "rgba(255, 204, 0,1)", "pointColor" => "rgba(255, 204, 0,1)","pointStrokeColor" => "#fff","pointHighlightFill"=> "#fff","pointHighlightStroke" => "rgba(255, 204, 0,1)", "data"=> $datosDiagrama));


        $barChartData = array('labels'=>$labels,"datasets"=>$datasets,"query"=>$query);
     
        echo json_encode(array('barChartData'=>$barChartData));
    }
}



/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
