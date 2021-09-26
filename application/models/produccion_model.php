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

    public function grafico_productividad($fecha_inicio,$fecha_fin){	
		$this->db->select("produccion_codigo as fe, SUM(produccion_cantidad) as pl, SUM(produccion_real) as pr");
		$this->db->from($this->tabla);
		$this->db->where("produccion_inicio >= ",$fecha_inicio);
		$this->db->where("produccion_inicio <= ",$fecha_fin);
		$this->db->where("produccion_indicador", 1);
		$this->db->group_by("produccion_codigo");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function grafico_reproceso($fecha_inicio,$fecha_fin){	
		$this->db->select("produccion_codigo as fe, SUM(produccion_real) as pr, SUM(produccion_reprocesado) as re");
		$this->db->from($this->tabla);
		$this->db->where("produccion_inicio >= ",$fecha_inicio);
		$this->db->where("produccion_inicio <= ",$fecha_fin);
		$this->db->where("produccion_indicador", 1);
		$this->db->group_by("produccion_codigo");
		$resultados = $this->db->get();
		return $resultados->result();
	}

}
