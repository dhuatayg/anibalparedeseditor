<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class producto_model extends CI_Model {

    var $tabla = '010_producto';
    var $estado = 'estado_id';
    var $codigo = 'producto_id';

    public function get_registros(){
        $this->db->select('p.*, c.categoria_nombre as categoria_nombre');
        $this->db->from('010_producto p');
        $this->db->join('008_categoria c',"p.categoria_id = c.categoria_id");
        $this->db->where('p.estado_id !=','3');
        $query = $this->db->get();
        return $query->result();
    }

    public function listar(){
        $this->db->select('p.*, c.categoria_nombre as categoria_nombre');
        $this->db->from('010_producto p');
        $this->db->join('008_categoria c',"p.categoria_id = c.categoria_id");
        $this->db->where('p.estado_id','1');
        $query = $this->db->get();
        return $query->result();
    }

    public function obtener($id){
        $this->db->where($this->codigo,$id);
        $query = $this->db->get($this->tabla);
        return $query->result_array();
    }

    public function capturar($id){
        $this->db->where($this->codigo,$id);
        $query = $this->db->get($this->tabla);
        return $query->row();
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

    public function guardar_material($data){



    }

    public function guardar_maquina($data){



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
