<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entregas extends MX_Controller {
    public $cview = "entregas";
    public $controller = "entregas";
    public $template = 'templates/admin_entrega';
    public $data =[
        "idVehiculos" => "",
        "idPersonas" => "",
        "fechaRegistro" => "",
        "idServicios" => "",
        "fechaServicio" => "",
        "idEstados" => "1"
    ];

    public function __construct(){
        parent::__construct();
        $this->load->model('Tbl_usuario','obj_usuario');    
        $this->load->model('Tbl_vehiculos','obj_vehiculos');    
        $this->load->model('Tbl_personas','obj_personas');    
        $this->load->model('Tbl_servicios','obj_servicios');    
           
        $this->load->model('Tbl_entregas','obj_model');    
       
        if($this->session->userdata('logged') != 'true'){
            redirect('login');
        }
    }
	 
	public function index(){ 
        $this->tmp_admin->set("controller",$this->controller);
        $this->tmp_admin->set("model",$this->obj_model->get_all());
        $this->load->tmp_admin->setLayout($this->template);
        $this->load->tmp_admin->render($this->cview.'/view.php');
    }
    
	public function agregar(){ 
        $this->form_validation->set_rules('idVehiculos', 'Vehículo', 'trim|required');
        $this->form_validation->set_rules('idPersonas', 'Mecánico', 'trim|required');
        $this->form_validation->set_rules('idServicios', 'Servicio', 'trim|required');

        $this->form_validation->set_message('required', 'Este campo es requerido');
        
        if ($this->form_validation->run($this) == FALSE)
        {
            $this->tmp_admin->set("vehiculos",$this->obj_vehiculos->get_all());
            $this->tmp_admin->set("personas",$this->obj_personas->get_all());
            $this->tmp_admin->set("servicios",$this->obj_servicios->get_all());

            $this->tmp_admin->set("controller",$this->controller);
            $this->load->tmp_admin->setLayout($this->template);
            $this->load->tmp_admin->render($this->cview.'/agregar_view.php');
        }
        else
        {   
            $data = $this->upPost($this->data);

            $data["fechaRegistro"] = date("Y-m-d");

            $this->obj_model->insert($data);
            redirect("admin/".$this->controller);
        }
    }

	public function editar($id){ 
        $this->form_validation->set_rules('idVehiculos', 'Vehículo', 'trim|required');
        $this->form_validation->set_rules('idPersonas', 'Mecánico', 'trim|required');
        $this->form_validation->set_rules('idServicios', 'Servicio', 'trim|required');
        
        $this->form_validation->set_message('required', 'Este campo es requerido');
        
        if ($this->form_validation->run($this) == FALSE)
        {
            $this->tmp_admin->set("vehiculos",$this->obj_vehiculos->get_all());
            $this->tmp_admin->set("personas",$this->obj_personas->get_all());
            $this->tmp_admin->set("servicios",$this->obj_servicios->get_all());
            
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
    
    public function logout(){                     
        $this->session->unset_userdata('logged');
        redirect('admin');
    }
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
 