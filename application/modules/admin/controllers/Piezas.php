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

        if (empty($_FILES['imagen']['name']))
        {
            $this->form_validation->set_rules('imagen', 'imagen', 'trim|required');
        }

        $this->form_validation->set_message('codigocheck', 'Este Código ya fue registrado.');
        
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

            $id_last = $this->obj_model->insert($data);

            

            $carpeta = "static/images/repuestos/".$id_last."/";
            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
            }
            
            $config['upload_path']          = $carpeta;
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 1025;
            $config['max_width']            = 5000;
            $config['max_height']           = 5000;
            $config['file_name']           = "1";

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('imagen'))
            {
                $error = "Imagen sobrepaso el límite de tamaño de un 1 Mb o el formato de la imagen no es válida";
                
               
              
               

                $this->tmp_admin->set("controller",$this->controller);
                    $this->tmp_admin->set("model",$this->obj_model->get_id($id_last));
                    $this->tmp_admin->set("error",$error);
                    $this->load->tmp_admin->setLayout($this->template);
                    $this->load->tmp_admin->render($this->cview.'/editar_view.php');
                redirect("admin/".$this->controller."/editar/".$id_last);
                // $error = array('error' => $this->upload->display_errors());
                // print_r($error);
                // redirect("admin/".$this->controller."/agregar");
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


            //redirect("admin/".$this->controller);
        }
    }

	public function editar($id){ 

        $pieza = $this->obj_model->get_id($id);
        $mismoCodigo = $pieza->codigo;

        $this->form_validation->set_rules('codigo', 'Codigo', array(
            'required',
            array(
                    'codigocheck',
                    function ($codigo) use (&$mismoCodigo)
                    {
                            if($codigo==$mismoCodigo){
                                return TRUE;
                            }else{
                                $pieza = $this->obj_model->get_campo("codigo",$codigo);
 
                                if(is_object($pieza)){
                                    $this->form_validation->set_message('codigocheck', 'Este Código ya fue registrado');
                                    return FALSE;
                                }else{
                                    return TRUE;
                                }
                            }
                    }
                )
            ));
        $this->form_validation->set_rules('descripcion', 'Descripción', 'trim|required');
        $this->form_validation->set_rules('costo', 'Precio Venta', 'trim|required');
        $this->form_validation->set_rules('precioCosto', 'Precio Costo', 'trim|required');

        $this->form_validation->set_message('codigocheck', 'Este Código ya fue registrado.');
        
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

            if (empty($_FILES['imagen']['name']))
            {
                redirect("admin/".$this->controller);
            }else{
                $carpeta = "static/images/repuestos/".$id."/";
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }
            
                $config['upload_path']          = $carpeta;
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 1025;
                $config['max_width']            = 5000;
                $config['max_height']           = 5000;
                $config['file_name']           = "1";
                $config['overwrite']           = TRUE;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('imagen'))
                {
                    $error = "Imagen sobrepaso el límite de tamaño de un 1 Mb o el formato de la imagen no es válida";
                    
                    //redirect("admin/".$this->controller."/editar/".$id);
                    $this->tmp_admin->set("controller",$this->controller);
                    $this->tmp_admin->set("model",$this->obj_model->get_id($id));
                    $this->tmp_admin->set("error",$error);
                    $this->load->tmp_admin->setLayout($this->template);
                    $this->load->tmp_admin->render($this->cview.'/editar_view.php');
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

            //redirect("admin/".$this->controller);
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
 