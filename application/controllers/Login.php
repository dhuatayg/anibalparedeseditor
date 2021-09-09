<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('usuario_model','usuario');
	}

	public function index(){
		if ($this->session->userdata('login')) 
			redirect(base_url().'menu');
		else
			$this->load->view('login');
	}

	public function login(){
		$usuario_usuario = $this->input->post('usuario_usuario');
		$usuario_clave = $this->input->post('usuario_clave');
		$usuario = $this->usuario->login($usuario_usuario, sha1($usuario_clave));
		if (!$usuario) {
			$this->session->set_flashdata('error','El usuario y/o contraseña son incorrectos');
			redirect(base_url());
		}else{
			$data  = array(
				'usuario_id' => $usuario->usuario_id, 
				'usuario_codigo' => $usuario->usuario_codigo, 
				'usuario_documento' => $usuario->usuario_documento,
				'usuario_nombres' => $usuario->usuario_nombres,
				'usuario_apellidos' => $usuario->usuario_apellidos,
				'usuario_usuario' => $usuario->usuario_usuario,
				'usuario_clave' => $usuario->usuario_clave,
				'rol_id' => $usuario->rol_id,
				'estado_id' => $usuario->estado_id,
				'login' => TRUE
			);
			$this->session->set_userdata($data);
			redirect(base_url().'menu');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
