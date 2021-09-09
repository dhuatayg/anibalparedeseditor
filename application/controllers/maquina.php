<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class maquina extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login"))
            redirect(base_url()); 
		$this->load->model('maquina_model','maquina');
    }
    
	public function index(){
		$data = array(
			'entidades' => $this->maquina->get_registros()
		);
        $this->load->view("cuerpo/header");
        $this->load->view("cuerpo/nav");
		$this->load->view("maquina",$data);
		$this->load->view("cuerpo/footer");
	}

	public function filas() {
        $resultado = $this->maquina->filas();
        echo json_encode($resultado);
	}

	public function obtener() {
        $id = $this->input->post('id');
        $resultado = $this->maquina->obtener($id);
        echo json_encode($resultado);
    }

	public function guardar(){
        $maquina_codigo = $this->input->post('maquina_codigo');
        $maquina_nombre = $this->input->post('maquina_nombre');
        $maquina_descripcion = $this->input->post('maquina_descripcion');
        $maquina_cantidad = $this->input->post('maquina_cantidad');
        $estado_id = $this->input->post('estado_id');
        $data = array(
            'maquina_codigo' => $maquina_codigo,
            'maquina_nombre' => $maquina_nombre,
            'maquina_descripcion' => $maquina_descripcion,
            'maquina_cantidad' => $maquina_cantidad,
            'estado_id' => $estado_id
        );
        $resultado = $this->maquina->guardar($data);
        echo json_encode($resultado);
	}
	
	public function modificar(){
        $id = $this->input->post('id');
        $maquina_codigo = $this->input->post('maquina_codigo');
        $maquina_nombre = $this->input->post('maquina_nombre');
        $maquina_descripcion = $this->input->post('maquina_descripcion');
        $maquina_cantidad = $this->input->post('maquina_cantidad');
        $estado_id = $this->input->post('estado_id');
        $data = array(
            'maquina_codigo' => $maquina_codigo,
            'maquina_nombre' => $maquina_nombre,
            'maquina_descripcion' => $maquina_descripcion,
            'maquina_cantidad' => $maquina_cantidad,
            'estado_id' => $estado_id
        );
        $resultado = $this->maquina->modificar($id, $data);
        echo json_encode($resultado);
	}
	
	public function eliminar(){
        $id = $this->input->post('id');
        $estado_id = '3';
        $data = array(
            'estado_id' => $estado_id
        );
        $resultado = $this->maquina->modificar($id, $data);
        echo json_encode($resultado);
    }

}
