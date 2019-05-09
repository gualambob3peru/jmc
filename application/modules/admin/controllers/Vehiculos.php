<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehiculos extends MX_Controller {
    public $cview = "vehiculos";
    public $template = 'templates/admin_config';
    public $controller = "vehiculos";
    public $data =[
        "placa" => "",
        "idMarcas" => "",
        "idModelos" => "",
        "motor" => "",
        "anio" => "",
        "serie" => "",
        "idClientes" => "",
        "idEstados" => "1"
    ];

    public function __construct(){
        parent::__construct();
        $this->load->model('Tbl_usuario','obj_usuario');    
           
        $this->load->model('Tbl_clientes','obj_clientes');    
        $this->load->model('Tbl_marcas','obj_marcas');  
        $this->load->model('Tbl_modelos','obj_modelos');  
        
        
        $this->load->model('Tbl_vehiculos','obj_model');    
       
        if($this->session->userdata('logged') != 'true'){
            redirect('login');
        }

        date_default_timezone_set("America/Lima");

        $this->load->library('form_validation');
        $this->form_validation->CI =& $this;
       
    }
	 
	public function index(){ 
        $this->tmp_admin->set("controller",$this->controller);
        $this->tmp_admin->set("model",$this->obj_model->get_all());
        $this->load->tmp_admin->setLayout($this->template);
        $this->load->tmp_admin->render($this->cview.'/view.php');
    }

    public function placacheck($placa){
        $vehiculo = $this->obj_model->get_campo("placa",$placa);

        if(is_object($vehiculo)){
            $this->form_validation->set_message('placacheck', 'Esta placa ya fue registrada');
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
	public function agregar(){ 
        $this->form_validation->set_rules('idClientes', 'idClientes', 'trim|required');
        $this->form_validation->set_rules('placa', 'Placa', 'trim|required|callback_placacheck');
        $this->form_validation->set_rules('idMarcas', 'idMarca', 'trim|required');
        $this->form_validation->set_rules('idModelos', 'idModelo', 'trim|required');

        $this->form_validation->set_message('placacheck', 'Esta placa ya fue registrada');
        
        if (empty($_FILES['imagen']['name']))
        {
            $this->form_validation->set_rules('imagen', 'imagen', 'trim|required');
        }

        

        $this->form_validation->set_message('required', 'Este campo es requerido');
        //$this->form_validation->set_message('placa_check', 'Esta placa ya fue registrada');
        
        if ($this->form_validation->run($this) == FALSE)
        {
            $this->tmp_admin->set("marcas",$this->obj_marcas->get_all());
            $this->tmp_admin->set("modelos",$this->obj_modelos->get_all());
            $this->tmp_admin->set("clientes",$this->obj_clientes->get_all());
            $this->tmp_admin->set("controller",$this->controller);
            $this->load->tmp_admin->setLayout($this->template);
            $this->load->tmp_admin->render($this->cview.'/agregar_view.php');
        }
        else
        {   
            $vehiculo = $this->obj_model->get_campo("placa",$this->input->post("placa"));
            
            $data = $this->upPost($this->data);
            $data["fechaRegistro"] = date("Y-m-d H:i:s");

            $id_last = $this->obj_model->insert($data);

            $carpeta = "static/images/".$this->controller."/".$id_last."/";
            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
            }
            
            $config['upload_path']          = 'static/images/'.$this->controller.'/'.$id_last.'/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 50000;
            $config['max_width']            = 5000;
            $config['max_height']           = 5000;
            $config['file_name']           = "1";

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('imagen'))
            {
                $error = array('error' => $this->upload->display_errors());
                //print_r($error);
                redirect("admin/".$this->controller."/agregar");
            }
            else
            {
                $result = array('upload_data' => $this->upload->data());
            
                $data = [
                    "imagen" => $result["upload_data"]["file_name"]
                ];
                $this->obj_model->update($data,$id_last);

                redirect("admin/".$this->controller);
            }
            
        }
    }

	public function editar($id){ 
        $this->form_validation->set_rules('idClientes', 'idClientes', 'trim|required');
        // $this->form_validation->set_rules('placa', 'Placa', 'trim|required|callback_placacheck');
        $this->form_validation->set_rules('idMarcas', 'idMarca', 'trim|required');
        $this->form_validation->set_rules('idModelos', 'idModelo', 'trim|required');

        if (empty($_FILES['imagen']['name']))
        {
            //$this->form_validation->set_rules('imagen', 'imagen', 'trim|required');
        }
        
        $this->form_validation->set_message('required', 'Este campo es requerido');
        
        if ($this->form_validation->run($this) == FALSE)
        {
            $model = $this->obj_model->get_id($id);
            $this->tmp_admin->set("clientes",$this->obj_clientes->get_all());
            $this->tmp_admin->set("marcas",$this->obj_marcas->get_all());
            $this->tmp_admin->set("modelos",$this->obj_modelos->get_campo($model->idMarcas,"idMarcas"));
            $this->tmp_admin->set("controller",$this->controller);
            $this->tmp_admin->set("model",$model);
            $this->load->tmp_admin->setLayout($this->template);
            $this->load->tmp_admin->render($this->cview.'/editar_view.php');
        }
        else
        {
            
            $data = $this->upPost($this->data);
            $this->obj_model->update($data,$id);

            if (empty($_FILES['imagen']['name']))
            {
                
            }else{
                $carpeta = "static/images/".$this->controller."/".$id;
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }

                $config['upload_path']          = 'static/images/'.$this->controller.'/'.$id.'/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 50000;
                $config['max_width']            = 5048;
                $config['max_height']           = 5068;
                $config['file_name']           = "1";
                $config['overwrite']           = TRUE;

                $this->load->library('upload', $config);
    
                //cargar archivo
                if ( ! $this->upload->do_upload('imagen'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                    redirect("admin/".$this->controller."/editar/".$id);
                }
                else
                {
                    $result = array('upload_data' => $this->upload->data());
                  
                    $data = [
                        "imagen" => $result["upload_data"]["file_name"]
                    ];
                    $this->obj_model->update($data,$id);
                    
                    redirect("admin/".$this->controller);
                    
                }
            }

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

    public function ajax_cargar_vehiculo($placa){
        $vehiculo = $this->obj_model->get_campo("placa",$placa);
        echo json_encode(array('respuesta' => $vehiculo ));
    }

    public function getAjaxModelos(){
        $idMarcas = $this->input->post('idMarcas');
        $modelos = $this->obj_modelos->get_campo($idMarcas,"idMarcas");
     
        echo json_encode(array("respuesta" => $modelos));
    }
    
    public function logout(){                     
        $this->session->unset_userdata('logged');
        redirect('admin');
    }
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
 