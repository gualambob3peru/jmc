<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Piezas extends MX_Controller {
    public $cview = "piezas";
    public $template = 'templates/admin_config';
    public $controller = "piezas";
    public $data =[
        "codigo" => "",
        "descripcion" => "",
        "costo" => "",
        "precioCosto" => "",
        "stock" => "",
        "idEstados" => "1"
    ];

    public function __construct(){
        parent::__construct();
        $this->load->model('Tbl_usuario','obj_usuario');    
           
        $this->load->model('Tbl_piezas','obj_model');    
       
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
    
    public function codigocheck($codigo){
        $pieza = $this->obj_model->get_campo("codigo",$codigo);

        if(is_object($pieza)){
            $this->form_validation->set_message('codigocheck', 'Este Código ya fue registrado');
            return FALSE;
        }else{
            return TRUE;
        }
    }

	public function agregar(){ 
        $this->form_validation->set_rules('codigo', 'Codigo', 'trim|required|callback_codigocheck');
        $this->form_validation->set_rules('descripcion', 'Descripción', 'trim|required');
        $this->form_validation->set_rules('costo', 'Precio Venta', 'trim|required');
        $this->form_validation->set_rules('precioCosto', 'Precio Costo', 'trim|required');

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
        $this->form_validation->set_rules('codigo', 'Codigo', 'trim|required');
        $this->form_validation->set_rules('descripcion', 'Descripción', 'trim|required');
        $this->form_validation->set_rules('costo', 'Precio Venta', 'trim|required');
        $this->form_validation->set_rules('precioCosto', 'Precio Costo', 'trim|required');
        
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

    public function getAjaxPiezas(){
        if ($this->input->is_ajax_request()) {
            $piezas = $this->obj_model->get_all();
            echo json_encode(array('respuesta' => $piezas ));
        }
    }
    
    public function logout(){                     
        $this->session->unset_userdata('logged');
        redirect('admin');
    }
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
 