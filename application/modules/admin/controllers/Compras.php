<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Compras extends MX_Controller {
    public $cview = "compras";
    public $template = 'templates/admin_config';
    public $controller = "compras";
    public $data =[
        "ruc" => "",
        "razonSocial" => "",
        "cantidad" => "",
        "idPiezas" => "",
        "costo" => "",
        "fechaCompras" => "",
        "idEstados" => "1"
    ];

    public function __construct(){
        parent::__construct();
        $this->load->model('Tbl_usuario','obj_usuario');    
        $this->load->model('Tbl_piezas','obj_piezas');    
           
        $this->load->model('Tbl_compras','obj_model');    
       
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
        $this->form_validation->set_rules('ruc', 'RUC', 'trim|required');
        $this->form_validation->set_rules('razonSocial', 'Razon Social', 'trim|required');
        // $this->form_validation->set_rules('cantidad', 'Cantidad', 'trim|required');
        // $this->form_validation->set_rules('idPiezas', 'Repuesto', 'trim|required');

        $this->form_validation->set_message('required', 'Este campo es requerido');
        
        if ($this->form_validation->run($this) == FALSE)
        {   
            $piezas = $this->obj_piezas->get_all();
            $this->tmp_admin->set("piezas",$piezas);
            $this->tmp_admin->set("controller",$this->controller);
            $this->load->tmp_admin->setLayout($this->template);
            $this->load->tmp_admin->render($this->cview.'/agregar_view.php');
        }
        else
        {   
           //Ingresando Compra
            $dataCompras = array();
            $dataCompras["ruc"] = $this->input->post("ruc"); 
            $dataCompras["razonSocial"] = $this->input->post("razonSocial");
            $dataCompras["fechaCompras"] = $this->input->post("fechaCompras"); 
            $dataCompras["idEstados"] = "1"; 
            $dataCompras["fechaRegistro"] = date("Y-m-d H:i:s"); 
            $idCompras = $this->obj_model->insert($dataCompras);

            $idRepuestos = $this->input->post("idRepuestos");
            $cantidad = $this->input->post("cantidad");
            $costo = $this->input->post("costo");

            
            //Ingresando Compras Repuestos
            $comprRespues = array();
            foreach ($idRepuestos as $key => $value) {
                if($cantidad[$key]!=""){

                    $row = array();
                    $row["idRepuestos"] = $idRepuestos[$key];
                    $row["cantidad"] = $cantidad[$key];
                    $row["costo"] = $costo[$key];
                    $row["idCompras"] = $idCompras;
    
                    array_push($comprRespues,$row);
                }
            }

            $this->obj_model->insert_batch_cr($comprRespues);


            // Cambiando Stock
            foreach ($idRepuestos as $key => $value) {
                if($cantidad[$key]!=""){

                    $this->obj_piezas->update_cantidad($idRepuestos[$key],$cantidad[$key]);
                }
            }

            redirect("admin/".$this->controller);
            

        }
    }

	public function editar($id){ 
        $this->form_validation->set_rules('ruc', 'RUC', 'trim|required');
        $this->form_validation->set_rules('razonSocial', 'Razon Social', 'trim|required');
        $this->form_validation->set_rules('cantidad', 'Cantidad', 'trim|required');
        $this->form_validation->set_rules('idPiezas', 'Repuesto', 'trim|required');
        
        $this->form_validation->set_message('required', 'Este campo es requerido');
        
        if ($this->form_validation->run($this) == FALSE)
        {
            $piezas = $this->obj_piezas->get_all();
            $this->tmp_admin->set("piezas",$piezas);
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

    public function getAjaxCompras(){
        $idCompras = $this->input->post("idCompras");

        $compra = $this->obj_model->get_id($idCompras);

        //Hallando compra de respuestos
        $repuestos = $this->obj_model->get_repuestos_idCompras($idCompras);

        echo json_encode(array("compra"=>$compra,"repuestos"=>$repuestos));
    }

	public function eliminar($id){ 
        $data = [
            "idEstados" => "0"
        ];
        $this->obj_model->update($data,$id);

        $compra = $this->obj_model->get_id($id);
        $idPiezas = $compra->idPiezas;
        $cantidad = $compra->cantidad;

        //disminuyendo stock
        $this->obj_piezas->update_cantidad($idPiezas,$cantidad,2);    

        

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
 