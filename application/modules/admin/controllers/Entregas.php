<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entregas extends MX_Controller {
    public $cview = "entregas";
    public $controller = "entregas";
    public $template = 'templates/admin_config';
    public $data =[
        "idVehiculos" => "",
        "fechaRegistro" => "",
        "kilometraje" => "",
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
        
        $model = $this->obj_model->get_all();
        foreach ($model as $key => $value) {
            $idEntregas = $value->id;
            $entregaServicios = $this->obj_model->get_entregaServicios($idEntregas);
            $montoTotal = 0;
            foreach ($entregaServicios as $key2 => $value2) {
                $montoTotal += (float)$value2->montoTotal;
            }
            $model[$key]->montoTotal = $montoTotal;
        }
        $this->tmp_admin->set("model",$model);
        $this->load->tmp_admin->setLayout($this->template);
        $this->load->tmp_admin->render($this->cview.'/view.php');
    }
    
	public function agregar(){ 
        $this->form_validation->set_rules('idVehiculos', 'Vehículo', 'trim|required');
        $this->form_validation->set_rules('kilometraje', 'kilometraje', 'trim|required');
       

        $this->form_validation->set_message('required', 'Este campo es requerido');
        
        if ($this->form_validation->run($this) == FALSE)
        {
            echo "--";
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
            $data["kilometraje"] = $this->input->post("kilometraje");
            $data["observaciones"] = $this->input->post("observaciones");
            $data["idEstados"] = "1";

            $id_last = $this->obj_model->insert($data);


            // $idPersonas = $this->input->post("idPersonas");
            // $idServicios = $this->input->post("idServicios");
            // $observacionesServicio = $this->input->post("observacionesServicio");
            // $monto = $this->input->post("monto");
            
            // for ($i=0; $i < count($idPersonas); $i++) { 
            //     $dataServicio = array();
            //     $dataServicio["idPersonas"] = $idPersonas[$i];
            //     $dataServicio["idServicios"] = $idServicios[$i];
            //     $dataServicio["observacionesServicio"] = $observacionesServicio[$i];
            //     $dataServicio["monto"] = $monto[$i];
            //     $this->obj_model->insert_entregaServicios($dataServicio);
            // }

            /* agregando multiples imagenes */

            /* agregando multiples imagenes */
            
            if(!empty($_FILES['imagen']['name'])) {
                $files = $_FILES;
                $filesCount = count($_FILES['imagen']['name']);
        
                for($i = 0; $i < $filesCount; $i++) {
                    $carpeta = "static/images/".$this->controller."/".$id_last;
                    if (!file_exists($carpeta)) {
                        mkdir($carpeta, 0777, true);
                    }
        
                    $_FILES['imagen']['name'] = $files['imagen']['name'][$i];
                    $_FILES['imagen']['type'] = $files['imagen']['type'][$i];
                    $_FILES['imagen']['tmp_name'] = $files['imagen']['tmp_name'][$i];
                    $_FILES['imagen']['error'] = $files['imagen']['error'][$i];
                    $_FILES['imagen']['size'] = $files['imagen']['size'][$i];
                    
                    $nombre = (string)$i;
                    $config['upload_path']          = 'static/images/'.$this->controller.'/'.$id_last.'/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['max_size']             = 700;
                    $config['max_width']            = 5048;
                    $config['max_height']           = 5068;
                    $config['file_name']           = uniqid();
                    $config['overwrite']           = TRUE;
                    
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
    
                    //cargar archivo
                    if ( ! $this->upload->do_upload('imagen'))
                    {
                        $error = array('error' => $this->upload->display_errors());
                        
                    }
                    else
                    {
                        $result = array('upload_data' => $this->upload->data());
                    
                        $data = [
                            "imagen" => $result["upload_data"]["file_name"],
                            "idEntregas" => $id_last
                        ];
                        $this->obj_model->insert_imagen_entrega($data,$id_last); 
                    }
        
                }
            }



            redirect("admin/entregas/editar/".$id_last);
        }
    }

	public function editar($id){ 
        $this->form_validation->set_rules('idVehiculos', 'Vehículo', 'trim|required');
        
        //$this->form_validation->set_rules('idServicios', 'Servicio', 'trim|required');
        
        $this->form_validation->set_message('required', 'Este campo es requerido');
        
        if ($this->form_validation->run($this) == FALSE)
        {
           
            
            $entregaServicios = $this->obj_model->get_entregaServicios($id);
            
            foreach ($entregaServicios as $key => $value) {
                $montoTotal = 0;
                //obtenido los repuestos de esta entrega
                $servicioRepuesto = $this->obj_model->getRepuestos_ES($value->id);
                foreach ($servicioRepuesto as $key2 => $value2) {
                    $montoTotal += (float)$value2->monto;
                }
                $entregaServicios[$key]->montoTotal= $montoTotal;
            }
           

            $piezas = $this->obj_piezas->get_all();
            $this->tmp_admin->set("piezas",$piezas);
            $imagenes = $this->obj_model->getIdImagenesEntregas($id);
            $this->tmp_admin->set("imagenes",$imagenes);
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

            if(!empty($_FILES['imagen']['name'])) {
                $files = $_FILES;
                $filesCount = count($_FILES['imagen']['name']);
        
                for($i = 0; $i < $filesCount; $i++) {
                    $carpeta = "static/images/".$this->controller."/".$id;
                    if (!file_exists($carpeta)) {
                        mkdir($carpeta, 0777, true);
                    }
        
                    $_FILES['imagen']['name'] = $files['imagen']['name'][$i];
                    $_FILES['imagen']['type'] = $files['imagen']['type'][$i];
                    $_FILES['imagen']['tmp_name'] = $files['imagen']['tmp_name'][$i];
                    $_FILES['imagen']['error'] = $files['imagen']['error'][$i];
                    $_FILES['imagen']['size'] = $files['imagen']['size'][$i];
                    
                    $nombre = (string)$i;
                    $config['upload_path']          = 'static/images/'.$this->controller.'/'.$id.'/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['max_size']             = 700;
                    $config['max_width']            = 5048;
                    $config['max_height']           = 5068;
                    $config['file_name']           = uniqid();
                    $config['overwrite']           = TRUE;
                    
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
    
                    //cargar archivo
                    if ( ! $this->upload->do_upload('imagen'))
                    {
                        $error = array('error' => $this->upload->display_errors());
                        
                    }
                    else
                    {
                        $result = array('upload_data' => $this->upload->data());
                    
                        $data = [
                            "imagen" => $result["upload_data"]["file_name"],
                            "idEntregas" => $id
                        ];
                        $this->obj_model->insert_imagen_entrega($data,$id); 
                    }
        
                }
            }


            redirect("admin/".$this->controller);
        }
    }

	public function eliminar($id){ 

        //listando entregaservicios de la entrega
        $entregasServicios = $this->obj_model->get_entregaServicios($id);

        foreach ($entregasServicios as $key => $value) {
            $this->eliminarServicio($value->id,$id);
        }

        $data = [
            "idEstados" => "0"
        ];
        $this->obj_model->update($data,$id);
        redirect("admin/".$this->controller);
    }

    public function btnAjaxServRepuesEliminar(){
        $idServicioRepuestos = $this->input->post("idServicioRepuestos");
        $data = array();
        $data["idEstados"]  = 0;

        $servicioRepuesto = $this->obj_model->get_idServicioRepuestos($idServicioRepuestos);

        
        $monto = $servicioRepuesto->monto;

        //Actualizando montoTotal y montoRepuestos
        $lat = $this->obj_model->update_monto_entregaServicio($servicioRepuesto->idEntregaServicios,$monto,"montoRepuestos",2);
        $this->obj_model->update_monto_entregaServicio($servicioRepuesto->idEntregaServicios,$monto,"montoTotal",2);
        

        //Desabilitando el Repuesto a estado 0
        $this->obj_model->updateServicioRepuestos($data,$idServicioRepuestos);


        //Hallando el CLiente para modificar el saldo
        $entregaServicios = $this->obj_model->get_idEntregasServicios($servicioRepuesto->idEntregaServicios); 
        $entrega = $this->obj_model->get_id($entregaServicios->idEntregas); 
        $vehiculo = $this->obj_vehiculos->get_id($entrega->idVehiculos);

        $this->obj_clientes->update_saldo($vehiculo->idClientes,$monto,2);

        // Modificando Stock
        $idPiezas = $servicioRepuesto->idPiezas;
        $this->obj_piezas->update_cantidad($idPiezas,$servicioRepuesto->cantidad);

        
        echo json_encode(array('respuesta' => "1" ));
    }

    public function eliminarServicio($id,$idEntrega){ 

        //hallando servicio y poniendo en estado 0
        $data = [
            "idEstados" => "0"
        ];

        $servicio = $this->obj_model->get_idEntregasServicios($id);
        $this->obj_model->updateServicio($data,$id);

        //borrando imagenes del servicio
        $data = ["idEstados" => "0"];
        $this->obj_model->updateImagenEntregas($data,$id,"idEntregaServicios");
        $imagenesServicio = $this->obj_model->getImagenes($id,"idEntregaServicios");
        
        foreach ($imagenesServicio as $key => $value) {
            $ruta = "static/images/entregas/".$idEntrega."/".$id."/".$value->imagen;
            if (file_exists($ruta)){
                unlink($ruta);
            }
        }



        //actualizando saldo de clientes
        $entrega = $this->obj_model->get_id($idEntrega);
        $this->obj_clientes->update_saldo($entrega->idClientes,$servicio->monto,2);
        
        //Sumando monto de repuestos para actualizar entrega servicios
        $servicioRepuestos = $this->obj_model->getRepuestos_ES($servicio->id);
        $montoRepuestos = 0;
        foreach ($servicioRepuestos as $key => $value) {
            $montoRepuestos += (float)$value->monto;
        }
        $this->obj_clientes->update_saldo($entrega->idClientes,$montoRepuestos,2);

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
        $data["montoTotal"] = $this->input->post("monto");
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
        

        $factura = $this->input->post("factura");
        $idPiezas = $this->input->post("idRepuestos");
        $cantidad = $this->input->post("cantidad");
        $monto = $this->input->post("monto");
        $idEntregaServicios = $this->input->post("idEntregaServicios");
        $idEntrega = $this->input->post("idEntrega");
        

        foreach ($idPiezas as $key => $value) {
            $data = array();
            $data["idEntregaServicios"] = $idEntregaServicios;
            $data["idPiezas"] = $idPiezas[$key];
            $data["cantidad"] = $cantidad[$key];
            $data["monto"] = $monto[$key];
            $data["factura"] = $factura[$key];
            $this->obj_model->insert_servicioRepuestos($data);

            //actualizando stock de piezas
            $this->obj_piezas->update_cantidad($idPiezas[$key],$cantidad[$key],2);
        }

        //SUmando monto de repuestos para actualizar entrega servicios
        $servicioRepuestos = $this->obj_model->getRepuestos_ES($idEntregaServicios);
        $montoRepuestos = 0;
        foreach ($servicioRepuestos as $key => $value) {
            $montoRepuestos += (float)$value->monto;
        }

        $data = array();
        $data["montoRepuestos"] = $montoRepuestos;
        $this->obj_model->updateServicio($data,$idEntregaServicios);

        $entrega = $this->obj_model->get_id($idEntrega); 
        $vehiculo = $this->obj_vehiculos->get_id($entrega->idVehiculos);

        $this->obj_clientes->update_saldo($vehiculo->idClientes,$montoRepuestos);

        //actualizando monto Total
        $entregaServicio = $this->obj_model->get_idEntregasServicios($idEntregaServicios);
        $monto = $entregaServicio->monto;
        $montoRepuestos = $entregaServicio->montoRepuestos;

        $data = array();
        $data["montoTotal"] = (float)$montoRepuestos + (float)$monto;
        $this->obj_model->updateServicio($data,$idEntregaServicios);

        redirect("admin/entregas/editar/".$idEntrega);
    }
    
    public function logout(){                     
        $this->session->unset_userdata('logged');
        redirect('admin');
    }

    public function subeAjaxImages(){
      
        $idEntregaServicios = $this->input->post("idEntregaServicios");
        $idEntregas = $this->input->post("imagenIdEntregas");
        if(!empty($_FILES['imagen']['name'])) {
                $files = $_FILES;
                $filesCount = count($_FILES['imagen']['name']);
        
                for($i = 0; $i < $filesCount; $i++) {
                    $carpeta = 'static/images/'.$this->controller.'/'.$idEntregas.'/'.$idEntregaServicios.'/';
                    if (!file_exists($carpeta)) {
                        mkdir($carpeta, 0777, true);
                    }
        
                    $_FILES['imagen']['name'] = $files['imagen']['name'][$i];
                    $_FILES['imagen']['type'] = $files['imagen']['type'][$i];
                    $_FILES['imagen']['tmp_name'] = $files['imagen']['tmp_name'][$i];
                    $_FILES['imagen']['error'] = $files['imagen']['error'][$i];
                    $_FILES['imagen']['size'] = $files['imagen']['size'][$i];
                    
                   
                    $config['upload_path']          = 'static/images/'.$this->controller.'/'.$idEntregas.'/'.$idEntregaServicios.'/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['max_size']             = 700;
                    $config['max_width']            = 5048;
                    $config['max_height']           = 5068;
                    $config['file_name']           = uniqid();
                    $config['overwrite']           = TRUE;
                    
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
    
                    //cargar archivo
                    if ( ! $this->upload->do_upload('imagen'))
                    {
                        $error = array('error' => $this->upload->display_errors());
                        
                    }
                    else
                    {
                        $result = array('upload_data' => $this->upload->data());
                    
                        $data = [
                            "imagen" => $result["upload_data"]["file_name"],
                            "idEntregaServicios" => $idEntregaServicios,
                            "idEntregas" => $idEntregas,
                        ];
                        $this->obj_model->insert_imagen($data,$idEntregas); 
                    }
        
                }
            }
    }

    public function getAjaxImagenes(){
        $idEntregaServicios = $this->input->post("idEntregaServicios");

        $imagenes = $this->obj_model->getImagenes($idEntregaServicios);
        echo json_encode(array('imagenes' => $imagenes ));
    }


    public function ajaxDeleteImagen(){
        $idImagenEntregas = $this->input->post("idImagenEntregas");

        $this->deleteImagen($idImagenEntregas);

        echo json_encode(array('respuesta' => "1" ));
    }

    public function deleteImagen($idImagenEntregas){
        $imagenServicios = $this->obj_model->getIdImagenes($idImagenEntregas);
        $nombreImagen = $imagenServicios->imagen;
        $idEntregas = $imagenServicios->idEntregas;
        $idEntregaServicios = $imagenServicios->idEntregaServicios;

        $rutImagen = 'static/images/entregas/'.$idEntregas.'/'.$idEntregaServicios.'/'.$nombreImagen;
        if(file_exists($rutImagen)){
            unlink('static/images/entregas/'.$idEntregas.'/'.$idEntregaServicios.'/'.$nombreImagen);
        }
        

        $data = [
            "idEstados" => "0"
        ];

        $imagenes = $this->obj_model->updateImagenEntregas($data,$idImagenEntregas);
    }


}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
 