<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fase extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login"))
            redirect(base_url()); 
        $this->load->model('fase_model','fase');
        $this->load->model('area_model','area');
    }
    
	public function index(){
		$data = array(
            'entidades' => $this->fase->get_registros(),
            'areas' => $this->area->listar()
		);
        $this->load->view("cuerpo/header");
        $this->load->view("cuerpo/nav");
		$this->load->view("fase",$data);
		$this->load->view("cuerpo/footer");
	}

	public function filas() {
        $resultado = $this->fase->filas();
        echo json_encode($resultado);
	}

	public function obtener() {
        $id = $this->input->post('id');
        $resultado = $this->fase->obtener($id);
        echo json_encode($resultado);
    }

	public function guardar(){
        $fase_codigo = $this->input->post('fase_codigo');
        $fase_nombre = $this->input->post('fase_nombre');
        $fase_descripcion = $this->input->post('fase_descripcion');
        $area_id = $this->input->post('area_id');
        $estado_id = $this->input->post('estado_id');
        $data = array(
            'fase_codigo' => $fase_codigo,
            'fase_nombre' => $fase_nombre,
            'fase_descripcion' => $fase_descripcion,
            'area_id' => $area_id,
            'estado_id' => $estado_id
        );
        $resultado = $this->fase->guardar($data);
        echo json_encode($resultado);
	}
	
	public function modificar(){
        $id = $this->input->post('id');
        $fase_codigo = $this->input->post('fase_codigo');
        $fase_nombre = $this->input->post('fase_nombre');
        $fase_descripcion = $this->input->post('fase_descripcion');
        $area_id = $this->input->post('area_id');
        $estado_id = $this->input->post('estado_id');
        $data = array(
            'fase_codigo' => $fase_codigo,
            'fase_nombre' => $fase_nombre,
            'fase_descripcion' => $fase_descripcion,
            'area_id' => $area_id,
            'estado_id' => $estado_id
        );
        $resultado = $this->fase->modificar($id, $data);
        echo json_encode($resultado);
	}
	
	public function eliminar(){
        $id = $this->input->post('id');
        $estado_id = '3';
        $data = array(
            'estado_id' => $estado_id
        );
        $resultado = $this->fase->modificar($id, $data);
        echo json_encode($resultado);
    }

}
