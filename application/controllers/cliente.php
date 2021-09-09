<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cliente extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login"))
            redirect(base_url()); 
		$this->load->model('cliente_model','cliente');
    }
    
	public function index(){
		$data = array(
			'entidades' => $this->cliente->get_registros()
		);
        $this->load->view("cuerpo/header");
        $this->load->view("cuerpo/nav");
		$this->load->view("cliente",$data);
		$this->load->view("cuerpo/footer");
	}

	public function filas() {
        $resultado = $this->cliente->filas();
        echo json_encode($resultado);
	}

	public function obtener() {
        $id = $this->input->post('id');
        $resultado = $this->cliente->obtener($id);
        echo json_encode($resultado);
    }

	public function guardar(){
        $cliente_codigo = $this->input->post('cliente_codigo');
        $cliente_documento = $this->input->post('cliente_documento');
        $cliente_razon = $this->input->post('cliente_razon');
        $cliente_telefono = $this->input->post('cliente_telefono');
        $cliente_correo = $this->input->post('cliente_correo');
        $estado_id = $this->input->post('estado_id');
        $data = array(
            'cliente_codigo' => $cliente_codigo,
            'cliente_documento' => $cliente_documento,
            'cliente_razon' => $cliente_razon,
            'cliente_telefono' => $cliente_telefono,
            'cliente_correo' => $cliente_correo,
            'estado_id' => $estado_id
        );
        $resultado = $this->cliente->guardar($data);
        echo json_encode($resultado);
	}
	
	public function modificar(){
        $id = $this->input->post('id');
        $cliente_codigo = $this->input->post('cliente_codigo');
        $cliente_documento = $this->input->post('cliente_documento');
        $cliente_razon = $this->input->post('cliente_razon');
        $cliente_telefono = $this->input->post('cliente_telefono');
        $cliente_correo = $this->input->post('cliente_correo');
        $estado_id = $this->input->post('estado_id');
        $data = array(
            'cliente_codigo' => $cliente_codigo,
            'cliente_documento' => $cliente_documento,
            'cliente_razon' => $cliente_razon,
            'cliente_telefono' => $cliente_telefono,
            'cliente_correo' => $cliente_correo,
            'estado_id' => $estado_id
        );
        $resultado = $this->cliente->modificar($id, $data);
        echo json_encode($resultado);
	}
	
	public function eliminar(){
        $id = $this->input->post('id');
        $estado_id = '3';
        $data = array(
            'estado_id' => $estado_id
        );
        $resultado = $this->cliente->modificar($id, $data);
        echo json_encode($resultado);
    }

}
