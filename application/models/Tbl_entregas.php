<?php

class Tbl_entregas extends CI_Model{
    private $tabla = 'entregas';
    private $id = 'id';


    public function __construct() {
        parent::__construct();        
    }
    
    public function get_id($id){
        try {
            $this->db->where($this->id,$id);

            $query = $this->db->get($this->tabla);
            return $query->row();
        } catch (Exception $exc) {
            return FALSE;   
        }
    }

    public function get_all(){
        try {
            $this->db->from("entregas e");
            $this->db->select("e.id, e.idVehiculos,e.idPersonas,e.fechaRegistro,e.idServicios,e.fechaServicio,e.idEstados,v.placa,p.nombresCompletos,s.descripcion descripcion_servicios");
            $this->db->join("vehiculos v","v.id=e.idVehiculos");
            $this->db->join("personas p","p.id=e.idPersonas");
            $this->db->join("servicios s","s.id=e.idServicios");


            $this->db->where("e.idEstados", "1");
            $query = $this->db->get();
            return $query->result();
        } catch (Exception $exc) {
            return FALSE;   
        }
    }

    public function insert($data){
        try {
            $this->db->insert($this->tabla, $data);
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

    

} 
?>