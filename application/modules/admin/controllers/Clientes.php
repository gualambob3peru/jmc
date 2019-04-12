<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends MX_Controller {
    public $cview = "clientes";
    public $controller = "clientes";
    public $template = 'templates/admin_config';
    public $data =[
        "nombres" => "",
        "apellidoPaterno" => "",
        "apellidoMaterno" => "",
        "idTipoDocumentos" => "",
        "documento" => "",
        "direccion" => "",
        "correo" => "",
        "idEstados" => "1"
    ];

    public function __construct(){
        parent::__construct();
        $this->load->model('Tbl_usuario','obj_usuario');    
        $this->load->model('Tbl_tipoDocumentos','obj_tipoDocumentos');    
        $this->load->model('Tbl_tipoPagos','obj_tipoPagos');    
        $this->load->model('Tbl_tipoMonedas','obj_tipoMonedas');    
           
        $this->load->model('Tbl_clientes','obj_model');    
       
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
    
	public function agregar(){ 
        $this->form_validation->set_rules('nombres', 'Nombres', 'trim|required');
        $this->form_validation->set_rules('apellidoPaterno', 'Apellido Paterno', 'trim|required');
        $this->form_validation->set_rules('apellidoMaterno', 'Apellido Materno', 'trim|required');
        $this->form_validation->set_message('required', 'Este campo es requerido');
        
        if ($this->form_validation->run($this) == FALSE)
        {
            $tipoDocumentos = $this->obj_tipoDocumentos->get_all();


            $this->tmp_admin->set("tipoDocumentos",$tipoDocumentos);
            $this->tmp_admin->set("controller",$this->controller);
            $this->load->tmp_admin->setLayout($this->template);
            $this->load->tmp_admin->render($this->cview.'/agregar_view.php');
        }
        else
        {   
            $data = $this->upPost($this->data);
            $data["nombresCompletos"] = $this->input->post("apellidoPaterno") ." ". $this->input->post("apellidoMaterno") ." ". $this->input->post("nombres") ;
            $data["fechaRegistro"] = date("Y-m-d H:i:s");

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
            $tipoDocumentos = $this->obj_tipoDocumentos->get_all();


            $this->tmp_admin->set("tipoDocumentos",$tipoDocumentos);
            $this->tmp_admin->set("controller",$this->controller);
            $this->tmp_admin->set("model",$this->obj_model->get_id($id));
            $this->load->tmp_admin->setLayout($this->template);
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

    public function pagos($idClientes){
        $pagos = $this->obj_model->get_pagos_id($idClientes);
     
        
        $this->tmp_admin->set("pagos",$pagos);
        $this->tmp_admin->set("idClientes",$idClientes);
        $this->tmp_admin->set("controller",$this->controller);
        $this->load->tmp_admin->setLayout($this->template);
        $this->load->tmp_admin->render($this->cview.'/pago_cliente_view.php');
    }

    public function AgregarPagos($idClientes){
        $this->form_validation->set_rules('fechaPago', 'Fecha de Pago', 'trim|required');
        $this->form_validation->set_rules('idTipoMoneda', 'Tipo de Moneda', 'trim|required');
        $this->form_validation->set_rules('idTipoPago', 'Tipo de Pago', 'trim|required');
        //$this->form_validation->set_rules('tipoCambio', 'Tipo de Cambio', 'trim|required');
        $this->form_validation->set_rules('monto', 'Monto', 'trim|required');

        
        
        if ($this->form_validation->run($this) == FALSE)
        {
            //$tipoDocumentos = $this->obj_tipoDocumentos->get_all();

            $tipoPagos = $this->obj_tipoPagos->get_all(); 
            $tipoMonedas = $this->obj_tipoMonedas->get_all(); 

             
            $this->tmp_admin->set("controller",$this->controller);
            $this->tmp_admin->set("idClientes",$idClientes);
            $this->tmp_admin->set("tipoPagos",$tipoPagos);
            $this->tmp_admin->set("tipoMonedas",$tipoMonedas);

            $this->load->tmp_admin->setLayout($this->template);
            $this->load->tmp_admin->render($this->cview.'/agregar_pagos_view.php');
        }
        else
        {   

            
            $data["idClientes"] = $this->input->post("idClientes") ;
            $data["fechaPago"] = $this->input->post("fechaPago") ;
            $data["idTipoPago"] = $this->input->post("idTipoPago") ;
            $data["documento"] = $this->input->post("documento") ;
            $data["idTipoMoneda"] = $this->input->post("idTipoMoneda") ;
            $data["tipoCambio"] = $this->input->post("tipoCambio") ;

            if($data["idTipoMoneda"] == "2"){
                $data["monto"] = $this->input->post("monto") * $data["tipoCambio"];
            }else{
                $data["monto"] = $this->input->post("monto");
            }
            $data["fechaRegistro"] = date("Y-m-d H:i:s");
            $data["idEstados"] = "1";
          

            $this->obj_model->insert_pago($data);

            $this->obj_model->update_saldo($idClientes,$data["monto"],2);
            redirect("admin/clientes/pagos/".$idClientes);
        }
    }

	public function eliminar($id){ 
        $data = [
            "idEstados" => "0"
        ];
        $this->obj_model->update($data,$id);
        redirect("admin/".$this->controller);
    }

    public function eliminarPago($idClientes,$id){ 
        $data = [
            "idEstados" => "0"
        ];
        $this->obj_model->update_pago($data,$id);
       
        redirect("admin/clientes/pagos/".$idClientes);
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
 