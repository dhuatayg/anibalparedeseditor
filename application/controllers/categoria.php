<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class categoria extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login"))
            redirect(base_url()); 
		$this->load->model('categoria_model','categoria');
    }
    
	public function index(){
		$data = array(
			'entidades' => $this->categoria->get_registros()
		);
        $this->load->view("cuerpo/header");
        $this->load->view("cuerpo/nav");
		$this->load->view("categoria",$data);
		$this->load->view("cuerpo/footer");
	}

	public function filas() {
        $resultado = $this->categoria->filas();
        echo json_encode($resultado);
	}

	public function obtener() {
        $id = $this->input->post('id');
        $resultado = $this->categoria->obtener($id);
        echo json_encode($resultado);
    }

	public function guardar(){
        $categoria_codigo = $this->input->post('categoria_codigo');
        $categoria_nombre = $this->input->post('categoria_nombre');
        $categoria_descripcion = $this->input->post('categoria_descripcion');
        $estado_id = $this->input->post('estado_id');
        $data = array(
            'categoria_codigo' => $categoria_codigo,
            'categoria_nombre' => $categoria_nombre,
            'categoria_descripcion' => $categoria_descripcion,
            'estado_id' => $estado_id
        );
        $resultado = $this->categoria->guardar($data);
        echo json_encode($resultado);
	}
	
	public function modificar(){
        $id = $this->input->post('id');
        $categoria_codigo = $this->input->post('categoria_codigo');
        $categoria_nombre = $this->input->post('categoria_nombre');
        $categoria_descripcion = $this->input->post('categoria_descripcion');
        $estado_id = $this->input->post('estado_id');
        $data = array(
            'categoria_codigo' => $categoria_codigo,
            'categoria_nombre' => $categoria_nombre,
            'categoria_descripcion' => $categoria_descripcion,
            'estado_id' => $estado_id
        );
        $resultado = $this->categoria->modificar($id, $data);
        echo json_encode($resultado);
	}
	
	public function eliminar(){
        $id = $this->input->post('id');
        $estado_id = '3';
        $data = array(
            'estado_id' => $estado_id
        );
        $resultado = $this->categoria->modificar($id, $data);
        echo json_encode($resultado);
    }

}
