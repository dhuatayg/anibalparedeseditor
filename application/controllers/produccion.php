<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produccion extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login"))
            redirect(base_url()); 
		$this->load->model('produccion_model','produccion');
        $this->load->model('producto_model','producto');
        $this->load->model('material_model','material');
        $this->load->model('fase_model','fase');
        $this->load->model('maquina_model','maquina');

    }
    
	public function index(){
		$data = array(
			'entidades' => $this->produccion->get_registros(),
            'productos' => $this->producto->listar()
		);
        $this->load->view("cuerpo/header");
        $this->load->view("cuerpo/nav");
		$this->load->view("produccion",$data);
		$this->load->view("cuerpo/footer");
	}

    public function productividad(){
        $this->load->view("cuerpo/header");
        $this->load->view("cuerpo/nav");
        $this->load->view("productividad");
        $this->load->view("cuerpo/footer");
    }
    
    public function reproceso(){
        $this->load->view("cuerpo/header");
        $this->load->view("cuerpo/nav");
        $this->load->view("reproceso");
        $this->load->view("cuerpo/footer");
    } 

    public function programar(){
        $produccion_id =  $this->uri->segment(4);
        $data =array(
                "produccion" => $this->Producciones_model->getProduccion($produccion_id),
                "materiales" => $this->Producciones_model->getMateriales($produccion_id),
                "procesos" => $this->Procesos_model->getProcesos(),
                "maquinas" => $this->Producciones_model->getMaquinas($produccion_id)
        );
        $this->load->view("cuerpo/header");
        $this->load->view("cuerpo/nav");
        $this->load->view("produccion/programar",$data);
        $this->load->view("cuerpo/footer");
    }

	public function view(){
		$produccion_id= $this->input->post("id");
		$data = array(
            "produccion" => $this->Producciones_model->getProduccion($produccion_id),
            "materiales" => $this->Producciones_model->getMateriales($produccion_id),
            "trabajos" => $this->Producciones_model->getTrabajo($produccion_id),
            "indirectos" => $this->Producciones_model->getIndirecto($produccion_id),
		);
		$this->load->view("produccion/view",$data);
	}

    public function progreso($produccion_id){ 
        $data  = array(
            'proceso_producciones' => $this->Producciones_model->getProgresos($produccion_id), 
            'produccion' => $this->Producciones_model->id($produccion_id)
        );     
        $this->load->view("cuerpo/header");
        $this->load->view("cuerpo/nav");
        $this->load->view("produccion/progreso",$data);
        $this->load->view("cuerpo/footer");
    }

    public function seguimiento($id){
        $data =array(
            "produccion" => $this->Producciones_model->getProduccion($id),
            "procesos"   => $this->Producciones_model->getProcesos($id)
        );
        $this->load->view("cuerpo/header");
        $this->load->view("cuerpo/nav");
        $this->load->view("produccion/seguimiento",$data);
        $this->load->view("cuerpo/footer");
    }

    public function timeline($id){
        $data =array(
            "timelines" => $this->Producciones_model->getTimeline($id),
            'produccion' => $this->Producciones_model->id($id)
        );
        $this->load->view("cuerpo/header");
        $this->load->view("cuerpo/nav");
        $this->load->view("produccion/timeline",$data);
        $this->load->view("cuerpo/footer");
    }

	public function filas() {
        $resultado = $this->produccion->filas();
        echo json_encode($resultado);
	}

	public function obtener() {
        $id = $this->input->post('id');
        $resultado = $this->produccion->obtener($id);
        echo json_encode($resultado);
    }

	public function guardar(){
        $produccion_codigo = $this->input->post('produccion_codigo');
        $producto_id = $this->input->post('producto_id');
        $produccion_inicio = $this->input->post('produccion_inicio');
        $produccion_fin = $this->input->post('produccion_fin');
        $produccion_cantidad = $this->input->post('produccion_cantidad');
        $estado_id = $this->input->post('estado_id');
        $data = array(
            'produccion_codigo' => $produccion_codigo,
            'producto_id' => $producto_id,
            'produccion_inicio' => $produccion_inicio,
            'produccion_fin' => $produccion_fin,
            'produccion_cantidad' => $produccion_cantidad,
            'produccion_producido' => 0,
            'produccion_real' => 0,
            'produccion_reprocesado' => 0,
            'produccion_monto_material' => 0,
            'produccion_monto_trabajo' => 0,
            'produccion_monto_indirecto' => 0,
            'produccion_total_produccion' => 0,
            'estado_id' => 6,
            'produccion_indicador' =>  $estado_id
        );
        $resultado = $this->produccion->guardar($data);
        echo json_encode($resultado);
	}

	
	public function modificar(){
        $id = $this->input->post('id');
        $produccion_codigo = $this->input->post('produccion_codigo');
        $produccion_nombre = $this->input->post('produccion_nombre');
        $produccion_descripcion = $this->input->post('produccion_descripcion');
        $estado_id = $this->input->post('estado_id');
        $data = array(
            'produccion_codigo' => $produccion_codigo,
            'produccion_nombre' => $produccion_nombre,
            'produccion_descripcion' => $produccion_descripcion,
            'estado_id' => $estado_id
        );
        $resultado = $this->produccion->modificar($id, $data);
        echo json_encode($resultado);
	}
	
	public function eliminar(){
        $id = $this->input->post('id');
        $estado_id = '3';
        $data = array(
            'estado_id' => $estado_id
        );
        $resultado = $this->produccion->modificar($id, $data);
        echo json_encode($resultado);
    }

}
