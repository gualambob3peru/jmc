<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personas extends MX_Controller {
    public $cview = "personas";
    public $controller = "personas";
    public $data =[
        "nombres" => "",
        "apellidoPaterno" => "",
        "apellidoMaterno" => "",
        "nombresCompletos" => "",
        "idTipoPersonas" => "",
        "idTipoDocumentos" => "",
        "documento" => "",
        "direccion" => "",
        "correo" => "",
        "idEstados" => "1"
    ];

    public function __construct(){
        parent::__construct();
        $this->load->model('Tbl_usuario','obj_usuario');    
           
        $this->load->model('Tbl_personas','obj_model');    
        $this->load->model('Tbl_tipoPersonas','obj_tipoPersonas');    
        $this->load->model('Tbl_tipoDocumentos','obj_tipoDocumentos');    
        
       
        if($this->session->userdata('logged') != 'true'){
            redirect('login');
        }
    }
	 
	public function index(){ 
        $this->tmp_admin->set("controller",$this->controller);
        $this->tmp_admin->set("model",$this->obj_model->get_all());
        $this->load->tmp_admin->setLayout('templates/admin_tmp');
        $this->load->tmp_admin->render($this->cview.'/view.php');
    }
    
	public function agregar(){ 
        $this->form_validation->set_rules('nombres', 'Nombres', 'trim|required');
        $this->form_validation->set_rules('apellidoPaterno', 'Apellido Paterno', 'trim|required');
        $this->form_validation->set_rules('apellidoMaterno', 'Apellido Materno', 'trim|required');
        $this->form_validation->set_message('required', 'Este campo es requerido');
        
        if ($this->form_validation->run($this) == FALSE)
        {
            $this->tmp_admin->set("controller",$this->controller);
            $this->tmp_admin->set("tipoPersonas",$this->obj_tipoPersonas->get_all());
            $this->tmp_admin->set("tipoDocumentos",$this->obj_tipoDocumentos->get_all());

            $this->load->tmp_admin->setLayout('templates/admin_tmp');
            $this->load->tmp_admin->render($this->cview.'/agregar_view.php');
        }
        else
        {   
            $data = $this->upPost($this->data);
            $data["nombresCompletos"] = $this->input->post("apellidoPaterno") ." ". $this->input->post("apellidoMaterno") ." ". $this->input->post("nombres") ;
            $data["fechaRegistro"] = date("Y-m-d");

            $this->obj_model->insert($data);
            redirect("admin/".$this->controller);
        }
    }

	public function editar($id){ 
        $this->form_validation->set_rules('nombres', 'Nombres', 'trim|required');
        $this->form_validation->set_rules('apellidoPaterno', 'Apellido Paterno', 'trim|required');
        $this->form_validation->set_rules('apellidoMaterno', 'Apellido Materno', 'trim|required');
        
        $this->form_validation->set_message('required', 'Este campo es requerido');
        
        if ($this->form_validation->run($this) == FALSE)
        {
            $this->tmp_admin->set("tipoPersonas",$this->obj_tipoPersonas->get_all());
            $this->tmp_admin->set("tipoDocumentos",$this->obj_tipoDocumentos->get_all());
            $this->tmp_admin->set("controller",$this->controller);
            $this->tmp_admin->set("model",$this->obj_model->get_id($id));
            $this->load->tmp_admin->setLayout('templates/admin_tmp');
            $this->load->tmp_admin->render($this->cview.'/editar_view.php');
        }
        else
        {
            $data = $this->upPost($this->data);
            $data["nombresCompletos"] = $this->input->post("apellidoPaterno") ." ". $this->input->post("apellidoMaterno") ." ". $this->input->post("nombres") ;

           
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
 