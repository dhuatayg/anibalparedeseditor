<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class area extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login"))
            redirect(base_url()); 
		$this->load->model('area_model','area');
    }
    
	public function index(){
		$data = array(
			'entidades' => $this->area->get_registros()
		);
        $this->load->view("cuerpo/header");
        $this->load->view("cuerpo/nav");
		$this->load->view("area",$data);
		$this->load->view("cuerpo/footer");
	}

	public function filas() {
        $resultado = $this->area->filas();
        echo json_encode($resultado);
	}

	public function obtener() {
        $id = $this->input->post('id');
        $resultado = $this->area->obtener($id);
        echo json_encode($resultado);
    }

	public function guardar(){
        $area_codigo = $this->input->post('area_codigo');
        $area_nombre = $this->input->post('area_nombre');
        $area_descripcion = $this->input->post('area_descripcion');
        $estado_id = $this->input->post('estado_id');
        $data = array(
            'area_codigo' => $area_codigo,
            'area_nombre' => $area_nombre,
            'area_descripcion' => $area_descripcion,
            'estado_id' => $estado_id
        );
        $resultado = $this->area->guardar($data);
        echo json_encode($resultado);
	}
	
	public function modificar(){
        $id = $this->input->post('id');
        $area_codigo = $this->input->post('area_codigo');
        $area_nombre = $this->input->post('area_nombre');
        $area_descripcion = $this->input->post('area_descripcion');
        $estado_id = $this->input->post('estado_id');
        $data = array(
            'area_codigo' => $area_codigo,
            'area_nombre' => $area_nombre,
            'area_descripcion' => $area_descripcion,
            'estado_id' => $estado_id
        );
        $resultado = $this->area->modificar($id, $data);
        echo json_encode($resultado);
	}
	
	public function eliminar(){
        $id = $this->input->post('id');
        $estado_id = '3';
        $data = array(
            'estado_id' => $estado_id
        );
        $resultado = $this->area->modificar($id, $data);
        echo json_encode($resultado);
    }

}
