<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuario extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login"))
            redirect(base_url()); 
        $this->load->model('usuario_model','usuario');
        $this->load->model('rol_model','rol');
    }
    
	public function index(){
		$data = array(
            'entidades' => $this->usuario->get_registros(),
            'roles' => $this->rol->listar()
		);
        $this->load->view("cuerpo/header");
        $this->load->view("cuerpo/nav");
		$this->load->view("usuario",$data);
		$this->load->view("cuerpo/footer");
    }
    
    public function configuracion(){
        $this->load->view("cuerpo/header");
        $this->load->view("cuerpo/nav");
		$this->load->view("configuracion");
		$this->load->view("cuerpo/footer");
	}

	public function filas() {
        $resultado = $this->usuario->filas();
        echo json_encode($resultado);
	}

	public function obtener() {
        $id = $this->input->post('id');
        $resultado = $this->usuario->obtener($id);
        echo json_encode($resultado);
    }

	public function guardar(){
        $usuario_codigo = $this->input->post('usuario_codigo');
        $usuario_documento = $this->input->post('usuario_documento');
        $usuario_nombres = $this->input->post('usuario_nombres');
        $usuario_apellidos = $this->input->post('usuario_apellidos');
        $usuario_usuario = $this->input->post('usuario_usuario');
        $usuario_clave = $this->input->post('usuario_clave');
        $rol_id = $this->input->post('rol_id');
        $estado_id = $this->input->post('estado_id');
        $data = array(
            'usuario_codigo' => $usuario_codigo,
            'usuario_documento' => $usuario_documento,
            'usuario_nombres' => $usuario_nombres,
            'usuario_apellidos' => $usuario_apellidos,
            'usuario_usuario' => $usuario_usuario,
            'usuario_clave' => sha1($usuario_clave),
            'rol_id' => $rol_id,
            'estado_id' => $estado_id
        );
        $resultado = $this->usuario->guardar($data);
        echo json_encode($resultado);
	}
	
	public function modificar(){
        $id = $this->input->post('id');
        $usuario_codigo = $this->input->post('usuario_codigo');
        $usuario_documento = $this->input->post('usuario_documento');
        $usuario_nombres = $this->input->post('usuario_nombres');
        $usuario_apellidos = $this->input->post('usuario_apellidos');
        $usuario_usuario = $this->input->post('usuario_usuario');
        $usuario_clave = $this->input->post('usuario_clave');
        $rol_id = $this->input->post('rol_id');
        $estado_id = $this->input->post('estado_id');
        $data = array(
            'usuario_codigo' => $usuario_codigo,
            'usuario_documento' => $usuario_documento,
            'usuario_nombres' => $usuario_nombres,
            'usuario_apellidos' => $usuario_apellidos,
            'usuario_usuario' => $usuario_usuario,
            'usuario_clave' => sha1($usuario_clave),
            'rol_id' => $rol_id,
            'estado_id' => $estado_id
        );
        $resultado = $this->usuario->modificar($id, $data);
        echo json_encode($resultado);
    }
    
    public function renovar(){
        $id = $this->input->post('usuario_cambio');
        $clave = $this->input->post('clave_nueva');
        $data = array(
            'usuario_clave' => sha1($clave)
        );
        $resultado = $this->usuario->modificar($id, $data);
        echo json_encode($resultado);
	}
	
	public function eliminar(){
        $id = $this->input->post('id');
        $estado_id = '3';
        $data = array(
            'estado_id' => $estado_id
        );
        $resultado = $this->usuario->modificar($id, $data);
        echo json_encode($resultado);
    }

}
