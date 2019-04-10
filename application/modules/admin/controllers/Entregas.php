<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entregas extends MX_Controller {
    public $cview = "entregas";
    public $controller = "entregas";
    public $template = 'templates/admin_config';
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
        $this->load->model('Tbl_clientes','obj_clientes');    
        $this->load->model('Tbl_vehiculos','obj_vehiculos');    
        $this->load->model('Tbl_personas','obj_personas');    
        $this->load->model('Tbl_servicios','obj_servicios');    
        $this->load->model('Tbl_piezas','obj_piezas');    
           
        $this->load->model('Tbl_entregas','obj_model');    
       
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
        $this->form_validation->set_rules('idVehiculos', 'Vehículo', 'trim|required');
       

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
            $data = array();
            $data["idVehiculos"] = $this->input->post("idVehiculos");
            $data["fechaRegistro"] = date("Y-m-d H:i:s");
            $data["fechaServicio"] = $this->input->post("fechaServicio");
            $data["observaciones"] = $this->input->post("observaciones");
            $data["idEstados"] = "1";

            $id_last = $this->obj_model->insert($data);


            $idPersonas = $this->input->post("idPersonas");
            $idServicios = $this->input->post("idServicios");
            $observacionesServicio = $this->input->post("observacionesServicio");
            $monto = $this->input->post("monto");
            
            for ($i=0; $i < count($idPersonas); $i++) { 
                $dataServicio = array();
                $dataServicio["idPersonas"] = $idPersonas[$i];
                $dataServicio["idServicios"] = $idServicios[$i];
                $dataServicio["observacionesServicio"] = $observacionesServicio[$i];
                $dataServicio["monto"] = $monto[$i];
                $this->obj_model->insert_entregaServicios($dataServicio);
            }

            redirect("admin/entregas/editar/".$id_last);
        }
    }

	public function editar($id){ 
        $this->form_validation->set_rules('idVehiculos', 'Vehículo', 'trim|required');
        $this->form_validation->set_rules('idPersonas', 'Mecánico', 'trim|required');
        $this->form_validation->set_rules('idServicios', 'Servicio', 'trim|required');
        
        $this->form_validation->set_message('required', 'Este campo es requerido');
        
        if ($this->form_validation->run($this) == FALSE)
        {
            $entregaServicios = $this->obj_model->get_entregaServicios($id);

            $piezas = $this->obj_piezas->get_all();
            $this->tmp_admin->set("piezas",$piezas);

            $this->tmp_admin->set("vehiculos",$this->obj_vehiculos->get_all());
            $this->tmp_admin->set("personas",$this->obj_personas->get_all());
            $this->tmp_admin->set("servicios",$this->obj_servicios->get_all());
            $this->tmp_admin->set("entregaServicios",$entregaServicios);
            $this->tmp_admin->set("id",$id);

         
            
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

    public function eliminarServicio($id,$idEntrega){ 
        $data = [
            "idEstados" => "0"
        ];

        //hallando servicio
        $servicio = $this->obj_model->get_idEntregasServicios($id);

        $this->obj_model->updateServicio($data,$id);

        $entrega = $this->obj_model->get_id($idEntrega);

        $this->obj_clientes->update_saldo($entrega->idClientes,$servicio->monto,2);


        redirect("admin/".$this->controller."/editar/".$idEntrega);
    }

    public function upPost($data){
        $data = $this->data;

        foreach ($data as $key => $value) 
            if($this->input->post($key)!="") 
                $data[$key] = $this->input->post($key);
        
        return $data;
    }

    public function getAjaxRepuestos(){
        $idEntregaServicios = $this->input->post("idEntregaServicios");
        $repuestos = $this->obj_model->getRepuestos_ES($idEntregaServicios);
        
        echo json_encode(array('repuestos' => $repuestos ));
    }

    public function actualizarEntrega(){
        $data = array();
       
        $id = $this->input->post("id");
        $data["idVehiculos"] = $this->input->post("idVehiculos");
        $data["fechaServicio"] = $this->input->post("fechaServicio");
        $data["observaciones"] = $this->input->post("observaciones");
         
        $this->obj_model->update($data,$id);

        echo json_encode(array('resultado' => 1 ));
    }

    public function guardarServicios(){
        $data = array();
        $data["idPersonas"] = $this->input->post("idPersonas");
        $data["idServicios"] = $this->input->post("idServicios");
        $data["observacionesServicio"] = $this->input->post("observacionesServicio");
        $data["monto"] = $this->input->post("monto");
        $data["fechaRegistro"] = date("Y-m-d H:i:s");
        $data["fechaServicio"] = $this->input->post("fechaEntregaServicio");
        $data["idEntregas"] = $this->input->post("idModal");

        

        if($this->obj_model->insert_entregaServicios($data)>0){
         
            $entrega = $this->obj_model->get_id($this->input->post("idModal"));

            $this->obj_clientes->update_saldo($entrega->idClientes,$this->input->post("monto"));
            
        }

        redirect("admin/entregas/editar/".$this->input->post("idModal"));
    }

    public function postSavePiezas(){
        

        $idPiezas = $this->input->post("idRepuestos");
        $cantidad = $this->input->post("cantidad");
        $idEntregaServicios = $this->input->post("idEntregaServicios");
        $idEntrega = $this->input->post("idEntrega");

        foreach ($idPiezas as $key => $value) {
            $data = array();
            $data["idEntregaServicios"] = $idEntregaServicios;
            $data["idPiezas"] = $idPiezas[$key];
            $data["cantidad"] = $cantidad[$key];
            $this->obj_model->insert_servicioRepuestos($data);

            //actualizando stock de piezas
            $this->obj_piezas->update_cantidad($idPiezas[$key],$cantidad[$key],2);
        }

        redirect("admin/entregas/editar/".$idEntrega);
    }
    
    public function logout(){                     
        $this->session->unset_userdata('logged');
        redirect('admin');
    }
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
 