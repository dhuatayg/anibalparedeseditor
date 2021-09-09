<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class producto extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login"))
            redirect(base_url()); 
        $this->load->model('producto_model','producto');
        $this->load->model('categoria_model','categoria');
        $this->load->model('material_model','material');
        $this->load->model('maquina_model','maquina');
    }
    
	public function index(){
		$data = array(
            'entidades' => $this->producto->get_registros(),
            'categorias' => $this->categoria->listar(),
            'materiales' => $this->material->get_registros(),
            'maquinas' => $this->maquina->get_registros(),
		);
        $this->load->view("cuerpo/header");
        $this->load->view("cuerpo/nav");
		$this->load->view("producto",$data);
		$this->load->view("cuerpo/footer");
	}

	public function filas() {
        $resultado = $this->producto->filas();
        echo json_encode($resultado);
	}

	public function obtener() {
        $id = $this->input->post('id');
        $resultado = $this->producto->obtener($id);
        echo json_encode($resultado);
    }

	public function guardar(){
        $producto_codigo = $this->input->post('producto_codigo');
        $producto_nombre = $this->input->post('producto_nombre');
        $producto_descripcion = $this->input->post('producto_descripcion');
        $producto_stock = $this->input->post('producto_stock');
        $categoria_id = $this->input->post('categoria_id');
        $estado_id = $this->input->post('estado_id');
        $data_producto = array(
            'producto_codigo' => $producto_codigo,
            'producto_nombre' => $producto_nombre,
            'producto_descripcion' => $producto_descripcion,
            'producto_stock' => $producto_stock,
            'categoria_id' => $categoria_id,
            'estado_id' => $estado_id
        );
        $resultado = $this->producto->guardar($data_producto);
        echo json_encode($resultado);
	}
	
	public function modificar(){
        $id = $this->input->post('id');
        $producto_codigo = $this->input->post('producto_codigo');
        $producto_nombre = $this->input->post('producto_nombre');
        $producto_descripcion = $this->input->post('producto_descripcion');
        $producto_stock = $this->input->post('producto_stock');
        $categoria_id = $this->input->post('categoria_id');
        $estado_id = $this->input->post('estado_id');
        $data = array(
            'producto_codigo' => $producto_codigo,
            'producto_nombre' => $producto_nombre,
            'producto_descripcion' => $producto_descripcion,
            'producto_stock' => $producto_stock,
            'categoria_id' => $categoria_id,
            'estado_id' => $estado_id
        );
        $resultado = $this->producto->modificar($id, $data);
        echo json_encode($resultado);
	}
	
	public function eliminar(){
        $id = $this->input->post('id');
        $estado_id = '3';
        $data = array(
            'estado_id' => $estado_id
        );
        $resultado = $this->producto->modificar($id, $data);
        echo json_encode($resultado);
    }

}
