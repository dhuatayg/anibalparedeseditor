<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuario_model extends CI_Model {

    var $tabla = '003_usuario';
    var $estado = 'estado_id';
    var $codigo = 'usuario_id';

    public function get_registros(){
        $this->db->select('u.*, r.rol_nombre as rol_nombre');
        $this->db->from('003_usuario u');
        $this->db->join('002_rol r',"u.rol_id = r.rol_id");
        $this->db->where('u.estado_id !=','3');
        $query = $this->db->get();
        return $query->result();
    }

    public function listar(){
        $this->db->select('u.*, r.rol_nombre as rol_nombre');
        $this->db->from('003_usuario u');
        $this->db->join('002_rol r',"u.rol_id = r.rol_id");
        $this->db->where('u.estado_id =','1');
        $query = $this->db->get($this->tabla);
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

    public function login($usuario_usuario,$usuario_clave){
        $this->db->where("usuario_usuario",$usuario_usuario);
        $this->db->where("usuario_clave",$usuario_clave);
        $query = $this->db->get($this->tabla);
        if ($query->num_rows() > 0)
            return $query->row();
        else
            return false;
    }

}

