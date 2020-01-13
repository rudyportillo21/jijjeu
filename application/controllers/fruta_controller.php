<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fruta_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('fruta_model');
	}

	public function index()
	{
		$data = array('title'=>'Frutas||frutas');
		$this->load->view('template/header',$data);
		$this->load->view('fruta_view');
		$this->load->view('template/footer');
	}

	public function get_fruta(){
		$respuesta = $this->fruta_model->get_fruta();
		echo json_encode($respuesta);
	}

	public function eliminar(){
		$id = $this->input->post('id');
		$respuesta = $this->fruta_model->eliminar($id);
		echo json_encode($respuesta);
	}

	public function get_color(){
		$respuesta = $this->fruta_model->get_color();
		echo json_encode($respuesta);
	}

	public function get_sabor(){
		$respuesta = $this->fruta_model->get_sabor();
		echo json_encode($respuesta);
	}

	public function ingresar(){
		$datos['fruta'] = $this->input->post('fruta');
		$datos['color'] = $this->input->post('color');
		$datos['sabor'] = $this->input->post('sabor');

		$respuesta = $this->fruta_model->set_fruta($datos);
		echo json_encode($respuesta);
	}

	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->fruta_model->get_datos($id);
		echo json_encode($respuesta);
	}

	public function actualizar(){
		$datos['id_fruta'] = $this->input->post('id_fruta');
		$datos['fruta'] = $this->input->post('fruta');
		$datos['color'] = $this->input->post('color');
		$datos['sabor'] = $this->input->post('sabor');

		$respuesta = $this->fruta_model->actualizar($datos);
		echo json_encode($respuesta);
	}

}
