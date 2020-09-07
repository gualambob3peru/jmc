<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes extends MX_Controller {
    public $cview = "reportes";
    public $template = 'templates/admin_config';
    public $controller = "reportes";
    public $data =[
        "descripcion" => "",
        "idEstados" => "1"
    ];

    public function __construct(){
        parent::__construct();
        $this->load->model('Tbl_usuario','obj_usuario');    
           
        $this->load->model('Tbl_marcas','obj_model');    
        $this->load->model('Tbl_entregas','obj_entregas');    
       
        if($this->session->userdata('logged') != 'true'){
            redirect('login');
        }

        date_default_timezone_set("America/Lima");
    }
	 
	public function index(){ 
        $this->tmp_admin->set("controller",$this->controller);
        $this->tmp_admin->set("model",$this->obj_model->get_all());
        $this->load->tmp_admin->setLayout($this->template);
        $this->load->tmp_admin->render($this->cview.'/view.php');
    }

    public function repuestos($fechaInicio="2019-03-01",$fechaFin="",$factura="true"){ 
        if($fechaFin==""){
            $fechaFin = date("Y-m-d");
        }
        if($factura=="true"){
            $factura=1;
        }

       
        $repuestos = $this->obj_entregas->getServicioRepuesto_all($fechaInicio, $fechaFin, $factura);

        $this->tmp_admin->set("repuestos",$repuestos);
        $this->tmp_admin->set("fechaInicio",$fechaInicio);
        $this->tmp_admin->set("fechaFin",$fechaFin);
        $this->tmp_admin->set("factura",$factura);

        $this->tmp_admin->set("controller",$this->controller);
        $this->tmp_admin->set("model",$this->obj_model->get_all());
        $this->load->tmp_admin->setLayout($this->template);
        $this->load->tmp_admin->render($this->cview.'/repuestos.php');
    }
    public function repuestosPendientes(){ 
        
        $repuestos = $this->obj_entregas->getServicioRepuesto_all("", "", 0);

        $this->tmp_admin->set("repuestos",$repuestos);

        $this->tmp_admin->set("controller",$this->controller);
        $this->tmp_admin->set("model",$this->obj_model->get_all());
        $this->load->tmp_admin->setLayout($this->template);
        $this->load->tmp_admin->render($this->cview.'/repuestos_pendientes.php');
    }

    
    
	public function agregar(){ 
        $this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required');
        

        $this->form_validation->set_message('required', 'Este campo es requerido');
        
        if ($this->form_validation->run($this) == FALSE)
        {
            $this->tmp_admin->set("controller",$this->controller);
            $this->load->tmp_admin->setLayout($this->template);
            $this->load->tmp_admin->render($this->cview.'/agregar_view.php');
        }
        else
        {   
            $data = $this->upPost($this->data);
            $data["fechaRegistro"] = date("Y-m-d H:i:s");

            $this->obj_model->insert($data);
            redirect("admin/".$this->controller);
        }
    }

	public function editar($id){ 
        $this->form_validation->set_rules('descripcion', 'Descripcion', 'trim|required');
        
        $this->form_validation->set_message('required', 'Este campo es requerido');
        
        if ($this->form_validation->run($this) == FALSE)
        {
            $this->tmp_admin->set("controller",$this->controller);
            $this->tmp_admin->set("model",$this->obj_model->get_id($id));
            $this->load->tmp_admin->setLayout($this->template);
            $this->load->tmp_admin->render($this->cview.'/editar_view.php');
        }
        else
        {
            $data = $this->upPost($this->data);
           
            $this->obj_model->update($data,$id);
            redirect("admin/".$this->controller);
        }
    }

	public function eliminar($id){ 
        $data = [
            "idEstados" => "0"
        ];
        $this->obj_model->update($data,$id);
        redirect("admin/".$this->controller);
    }

    public function upPost($data){
        $data = $this->data;

        foreach ($data as $key => $value) 
            if($this->input->post($key)!="") 
                $data[$key] = $this->input->post($key);
        
        return $data;
    }


    public function ajaxSaveFacturacion(){
        if($this->input->is_ajax_request()){
            $fechaFacturacion = $this->input->post("fechaFacturacion"); 
            $id = $this->input->post("id"); 
         
         
            $this->saveFacturacion($id, $fechaFacturacion);
            echo json_encode(array("respuesta" => 1));
        }
    }

    public function saveFacturacion($id, $fechaFacturacion){
        $data = array(
            "fechaFacturacion" => $fechaFacturacion,
            "factura" => 1
        );
   
        $this->obj_entregas->updateServicioRepuestos($data,$id);
    }
    
    public function logout(){                     
        $this->session->unset_userdata('logged');
        redirect('admin');
    }
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
 