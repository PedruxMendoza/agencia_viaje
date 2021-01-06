<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class turista_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('turista_model');
	}	

	public function index()
	{
		/*$this->load->view('welcome_message');*/
		$datos['turista'] = $this->turista_model->get_turista();
		$datos['sexo'] = $this->turista_model->get_sexo();
		$datos['pais'] = $this->turista_model->get_pais();
		
		$this->load->view('turista_view', $datos);
	}

	public function eliminar($id)
	{
		$this->turista_model->eliminar($id);
		redirect('/turista_controller/index','refresh');
	}

	public function ingresar()
	{
		$datos["DUI"] = $_POST["DUI"];
		$datos["nombre"] = $_POST["nombre"];
		$datos["apellido"] = $_POST["apellido"];
		$datos["direccion"] = $_POST["direccion"];
		$datos["telefono"] = $_POST["telefono"];
		$datos["pasaporte"] = $_POST["pasaporte"];
		$datos["sexo"] = $_POST["sexo"];
		$datos["pais"] = $_POST["pais"];

		$msj = $this->turista_model->guardar($datos);
		if ($msj == "success") {
			$datos['turista'] = $this->turista_model->get_turista();
			$datos['sexo'] = $this->turista_model->get_sexo();
			$datos['pais'] = $this->turista_model->get_pais();
      $datos['msj'] = "success";  //Esto se agrega (no se encuentra en el index)
      $this->load->view('turista_view', $datos);
  }
  
}

public function get_datos($id)
{
	$datos['turista'] = $this->turista_model->get_datos($id);
	$datos['sexo'] = $this->turista_model->get_sexo();
	$datos['pais'] = $this->turista_model->get_pais();
	$this->load->view('turista_viewAct', $datos);
}

public function actualizar()
{
	$datos["DUI"] = $_POST["DUI"];
	$datos["nombre"] = $_POST["nombre"];
	$datos["apellido"] = $_POST["apellido"];
	$datos["direccion"] = $_POST["direccion"];
	$datos["telefono"] = $_POST["telefono"];
	$datos["pasaporte"] = $_POST["pasaporte"];
	$datos["sexo"] = $_POST["sexo"];
	$datos["pais"] = $_POST["pais"];

	$msj = $this->turista_model->actualizar($datos);
	if ($msj == "modi") {
		$datos['turista'] = $this->turista_model->get_turista();
		$datos['sexo'] = $this->turista_model->get_sexo();
		$datos['pais'] = $this->turista_model->get_pais();
      $datos['msj'] = "modi"; //Esto se agrega (no se encuentra en el index)
      $this->load->view('turista_view', $datos);
  }else{
  	$datos['turista'] = $this->turista_model->get_turista();
  	$datos['sexo'] = $this->turista_model->get_sexo();
  	$datos['pais'] = $this->turista_model->get_pais();
    $datos['msj'] = "ErrorM"; //Esto se agrega (no se encuentra en el index)
    $this->load->view('turista_view',$datos);  	
  }
  
}
}

?>