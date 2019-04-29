<?php

class Tbl_usuario extends CI_Model{
    private $tabla = 'usuario';
    private $contrasena = 'contrasena';
    private $usuario = 'usuario';



    public function __construct() {
        parent::__construct();        
    }
    
    public function get_usuario($id){
        try {
            $this->db->where('id',$id);

            $query = $this->db->get($this->tabla);
            return $query->row();
        } catch (Exception $exc) {
            return FALSE; 
        }
    }

    public function validar_usuario($usuario,$contrasena){
        try { 
            $this->db->where($this->usuario,$usuario);
            $this->db->where($this->contrasena,md5(helper_get_semilla().$contrasena));

            $query = $this->db->get($this->tabla);

            if($query->num_rows() > 0){
         
                $this->session->set_userdata('logged','true');
                $row = $query->row_array();
                $this->session->set_userdata($row);
            
            }
            return $query->row();
        } catch (Exception $exc) {
            return FALSE;
        }
    }
} 
?>