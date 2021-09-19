<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produccion_model extends CI_Model {

    var $tabla = '012_produccion';
    var $estado = 'estado_id';
    var $codigo = 'produccion_id';

    public function get_registros(){
        $this->db->select('p.*, e.estado_nombre, pr.producto_nombre');
        $this->db->from('012_produccion p');
        $this->db->join('001_estado e',"e.estado_id = p.estado_id");
        $this->db->join('010_producto pr',"pr.producto_id = p.producto_id");
        $this->db->where('p.produccion_indicador !=','0');
        $query = $this->db->get();
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
