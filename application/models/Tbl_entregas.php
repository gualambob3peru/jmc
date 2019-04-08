<?php

class Tbl_entregas extends CI_Model{
    private $tabla = 'entregas';
    private $id = 'id';


    public function __construct() {
        parent::__construct();        
    }
    
    public function get_id($id){
        try {
            $this->db->from("entregas e");
            $this->db->select("e.id, c.id idClientes, e.observaciones, e.idVehiculos,e.fechaRegistro,e.fechaServicio,e.idEstados,v.placa,c.nombresCompletos nombresClientes");
            $this->db->join("vehiculos v","v.id=e.idVehiculos");
            $this->db->join("clientes c","c.id=v.idClientes");



            $this->db->where("e.idEstados", "1");
            $this->db->where("e.id",$id);
            $query = $this->db->get();
            return $query->row();
        } catch (Exception $exc) {
            return FALSE;   
        }
    }

    public function get_idEntregasServicios($idEntregasServicios){
        try {
            
            $this->db->where("id",$idEntregasServicios);
            $query = $this->db->get("entregaServicios");
            return $query->row();
        } catch (Exception $exc) {
            return FALSE;   
        }
    }
    public function getRepuestos_ES($idEntregasServicios){
        try {
            $this->db->from("servicioRepuestos sR");
            $this->db->select("sR.id, sR.idEntregaServicios, sR.idRepuestos, sR.cantidad, r.descripcion");

            $this->db->join("piezas r","sR.idRepuestos=r.id");

            $this->db->where("sR.idEntregaServicios",$idEntregasServicios);
            $query = $this->db->get();
            return $query->result();
        } catch (Exception $exc) {
            return FALSE;   
        }
    }

    public function get_entregaServicios($idEntregas){
        $this->db->from("entregaServicios eS");
            $this->db->select("eS.id,eS.idPersonas, eS.idServicios,eS.idEntregas, eS.monto,eS.observacionesServicio,p.nombresCompletos,s.descripcion,eS.fechaServicio");
            $this->db->join("personas p","p.id=eS.idPersonas");
            $this->db->join("servicios s","s.id=eS.idServicios");
            
            
            

            $this->db->where("eS.idEstados", "1");
            $this->db->where("eS.idEntregas",$idEntregas);
            $query = $this->db->get();
            return $query->result();
    }

    public function get_all(){
        try {
            $this->db->from("entregas e");
            $this->db->select("e.id, e.idVehiculos,e.fechaRegistro,e.fechaServicio,e.idEstados,v.placa,c.nombresCompletos nombresClientes,c.saldo");
            $this->db->join("vehiculos v","v.id=e.idVehiculos");
            $this->db->join("clientes c","c.id=v.idClientes");


            
            $this->db->where("e.idEstados", "1");
            $this->db->order_by("e.fechaRegistro", "desc");
            $query = $this->db->get();
            return $query->result();
        } catch (Exception $exc) {
            return FALSE;   
        }
    }

    public function insert_entregaServicios($data){
        try {
            $this->db->insert("entregaServicios", $data);
            return $this->db->insert_id();

        } catch (Exception $exc) {
            return FALSE;   
        }
    }

    public function insert($data){
        try {
            $this->db->insert($this->tabla, $data);

            return $this->db->insert_id();
        } catch (Exception $exc) {
            return FALSE;   
        }
    }

    public function update($data,$id){
        try {
            $this->db->where($this->id, $id);
            $this->db->update($this->tabla, $data);
        } catch (Exception $exc) {
            return FALSE;   
        }
    }
    public function updateServicio($data,$id){
        try {
            $this->db->where($this->id, $id);
            $this->db->update("entregaServicios", $data);
        } catch (Exception $exc) {
            return FALSE;   
        }
    }

    

} 
?>