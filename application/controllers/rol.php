<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rol extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login"))
            redirect(base_url()); 
		$this->load->model('rol_model','rol');
    }
    
	public function index(){
		$data = array(
			'entidades' => $this->rol->get_registros()
		);
        $this->load->view("cuerpo/header");
        $this->load->view("cuerpo/nav");
		$this->load->view("rol",$data);
		$this->load->view("cuerpo/footer");
	}

	public function filas() {
        $resultado = $this->rol->filas();
        echo json_encode($resultado);
	}

	public function obtener() {
        $id = $this->input->post('id');
        $resultado = $this->rol->obtener($id);
        echo json_encode($resultado);
    }

	public function guardar(){
        $rol_codigo = $this->input->post('rol_codigo');
        $rol_nombre = $this->input->post('rol_nombre');
        $rol_descripcion = $this->input->post('rol_descripcion');
        $estado_id = $this->input->post('estado_id');
        $data = array(
            'rol_codigo' => $rol_codigo,
            'rol_nombre' => $rol_nombre,
            'rol_descripcion' => $rol_descripcion,
            'estado_id' => $estado_id
        );
        $resultado = $this->rol->guardar($data);
        echo json_encode($resultado);
	}
	
	public function modificar(){
        $id = $this->input->post('id');
        $rol_codigo = $this->input->post('rol_codigo');
        $rol_nombre = $this->input->post('rol_nombre');
        $rol_descripcion = $this->input->post('rol_descripcion');
        $estado_id = $this->input->post('estado_id');
        $data = array(
            'rol_codigo' => $rol_codigo,
            'rol_nombre' => $rol_nombre,
            'rol_descripcion' => $rol_descripcion,
            'estado_id' => $estado_id
        );
        $resultado = $this->rol->modificar($id, $data);
        echo json_encode($resultado);
	}
	
	public function eliminar(){
        $id = $this->input->post('id');
        $estado_id = '3';
        $data = array(
            'estado_id' => $estado_id
        );
        $resultado = $this->rol->modificar($id, $data);
        echo json_encode($resultado);
    }

}
