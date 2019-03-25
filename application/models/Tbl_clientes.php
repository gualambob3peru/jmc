<?php

class Tbl_clientes extends CI_Model{
    private $tabla = 'clientes';
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

            $this->db->from("clientes c");
            $this->db->select("c.id, c.nombres, c.apellidoPaterno, c.apellidoMaterno, c.nombresCompletos, c.idTipoDocumentos, c.documento, c.direccion, c.correo, c.saldo, c.idEstados, c.fechaRegistro, t.descripcion descripcion_tipoDocumentos");

            $this->db->join("tipoDocumentos t","t.id=c.idTipoDocumentos");
            $this->db->where("c.idEstados", "1");   


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