<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class material extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login"))
            redirect(base_url()); 
		$this->load->model('material_model','material');
    }
    
	public function index(){
		$data = array(
			'entidades' => $this->material->get_registros()
		);
        $this->load->view("cuerpo/header");
        $this->load->view("cuerpo/nav");
		$this->load->view("material",$data);
		$this->load->view("cuerpo/footer");
	}

	public function filas() {
        $resultado = $this->material->filas();
        echo json_encode($resultado);
	}

	public function obtener() {
        $id = $this->input->post('id');
        $resultado = $this->material->obtener($id);
        echo json_encode($resultado);
    }
    
    public function abastecimiento(){
        $id = $this->input->post('id');
        $material_abastecimiento = $this->input->post('material_abastecimiento');
        $stock = $this->material->capturar($id)->material_stock;
        $data = array(
            'material_stock' => $stock+$material_abastecimiento,
        );
        $resultado = $this->material->modificar($id, $data);
        echo json_encode($resultado);
    }

	public function guardar(){
        $material_codigo = $this->input->post('material_codigo');
        $material_nombre = $this->input->post('material_nombre');
        $material_descripcion = $this->input->post('material_descripcion');
        $material_unidad = $this->input->post('material_unidad');
        $material_stock = $this->input->post('material_stock');
        $material_precio = $this->input->post('material_precio');
        $estado_id = $this->input->post('estado_id');
        $data = array(
            'material_codigo' => $material_codigo,
            'material_nombre' => $material_nombre,
            'material_descripcion' => $material_descripcion,
            'material_unidad' => $material_unidad,
            'material_stock' => $material_stock,
            'material_precio' => $material_precio,
            'estado_id' => $estado_id
        );
        $resultado = $this->material->guardar($data);
        echo json_encode($resultado);
	}
	
	public function modificar(){
        $id = $this->input->post('id');
        $material_codigo = $this->input->post('material_codigo');
        $material_nombre = $this->input->post('material_nombre');
        $material_descripcion = $this->input->post('material_descripcion');
        $material_unidad = $this->input->post('material_unidad');
        $material_stock = $this->input->post('material_stock');
        $material_precio = $this->input->post('material_precio');
        $estado_id = $this->input->post('estado_id');
        $data = array(
            'material_codigo' => $material_codigo,
            'material_nombre' => $material_nombre,
            'material_descripcion' => $material_descripcion,
            'material_unidad' => $material_unidad,
            'material_stock' => $material_stock,
            'material_precio' => $material_precio,
            'estado_id' => $estado_id
        );
        $resultado = $this->material->modificar($id, $data);
        echo json_encode($resultado);
	}
	
	public function eliminar(){
        $id = $this->input->post('id');
        $estado_id = '3';
        $data = array(
            'estado_id' => $estado_id
        );
        $resultado = $this->material->modificar($id, $data);
        echo json_encode($resultado);
    }

}
