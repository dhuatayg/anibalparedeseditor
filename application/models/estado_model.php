<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class estado_model extends CI_Model {

    var $tabla = '001_estado';
    var $estado = 'estado_ind';
    var $codigo = 'estado_id';

    public function get_registros(){
        $this->db->where($this->estado.' !=','3');
        $query = $this->db->get($this->tabla);
        return $query->result();
    }

    public function listar(){
        $this->db->where($this->estado,'1');
        $query = $this->db->get($this->tabla);
        return $query->result();
    }

    public function obtener($id){
        $this->db->where($this->codigo,$id);
        $query = $this->db->get($this->tabla);
        return $query->result_array();
    }

    public function filas(){
        $this->db->from($this->tabla);
        return $this->db->count_all_results();    
    }

    public function guardar($data){
        $this->db->insert($this->tabla,$data);
        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    public function modificar($id, $data){
        $this->db->where($this->codigo,$id);
        $this->db->update($this->tabla,$data);
        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    public function eliminar($id){
        $this->db->where($this->codigo,$id); 
        $this->db->delete($this->tabla);
        if ($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

}
