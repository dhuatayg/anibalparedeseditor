<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class estado extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login"))
            redirect(base_url()); 
		$this->load->model('estado_model','estado');
    }
    
	public function index(){
		$data = array(
			'entidades' => $this->estado->get_registros()
		);
        $this->load->view("cuerpo/header");
        $this->load->view("cuerpo/nav");
		$this->load->view("estado",$data);
		$this->load->view("cuerpo/footer");
	}

	public function filas() {
        $resultado = $this->estado->filas();
        echo json_encode($resultado);
	}

	public function obtener() {
        $id = $this->input->post('id');
        $resultado = $this->estado->obtener($id);
        echo json_encode($resultado);
    }

	public function guardar(){
        $estado_codigo = $this->input->post('estado_codigo');
        $estado_nombre = $this->input->post('estado_nombre');
        $estado_descripcion = $this->input->post('estado_descripcion');
        $estado_ind = $this->input->post('estado_ind');
        $data = array(
            'estado_codigo' => $estado_codigo,
            'estado_nombre' => $estado_nombre,
            'estado_descripcion' => $estado_descripcion,
            'estado_ind' => $estado_ind
        );
        $resultado = $this->estado->guardar($data);
        echo json_encode($resultado);
	}
	
	public function modificar(){
        $id = $this->input->post('id');
        $estado_codigo = $this->input->post('estado_codigo');
        $estado_nombre = $this->input->post('estado_nombre');
        $estado_descripcion = $this->input->post('estado_descripcion');
        $estado_ind = $this->input->post('estado_ind');
        $data = array(
            'estado_codigo' => $estado_codigo,
            'estado_nombre' => $estado_nombre,
            'estado_descripcion' => $estado_descripcion,
            'estado_ind' => $estado_ind
        );
        $resultado = $this->estado->modificar($id, $data);
        echo json_encode($resultado);
	}
	
	public function eliminar(){
        $id = $this->input->post('id');
        $estado_ind = '3';
        $data = array(
            'estado_ind' => $estado_ind
        );
        $resultado = $this->estado->modificar($id, $data);
        echo json_encode($resultado);
    }

}
