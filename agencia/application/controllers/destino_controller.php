<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class destino_controller extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model("destino_model");
	}

	public function index()
	{   
		$datos["destino"] = $this->destino_model->get_destino();
		$datos["nombre_pais"] = $this->destino_model->get_nombre_pais();
		$this->load->view('destino_view', $datos);
	}
	public function eliminar($id){
		$this->destino_model->eliminar($id);
		redirect("/destino_controller/index", "refresh");
	}
	public function insertar(){
		$datos["nombre_ciudad"]=$_POST["nombre_ciudad"];
		$datos["nombre_pais"]=$_POST["nombre_pais"];
		$msj = $this->destino_model->set_destino($datos);
		if ($msj == "success") {
			$datos["destino"] = $this->destino_model->get_destino();
			$datos["nombre_pais"] = $this->destino_model->get_nombre_pais();
      $datos['msj'] = "success";  //Esto se agrega (no se encuentra en el index)
      $this->load->view('destino_view', $datos);
  }

}

public function get_datos($id){
	$datos["destino"] = $this->destino_model->get_datos($id);
	$datos["nombre_pais"] = $this->destino_model->get_nombre_pais();
	$this->load->view('destino_viewact', $datos);
}

public function actualizar(){
	$datos["id"]=$_POST["id"];
	$datos["nombre_ciudad"]=$_POST["nombre_ciudad"];
	$datos["nombre_pais"]=$_POST["nombre_pais"];

	$msj = $this->destino_model->actualizar($datos);
	if ($msj == "modi") {
		$datos["destino"] = $this->destino_model->get_destino();
		$datos["nombre_pais"] = $this->destino_model->get_nombre_pais();
      $datos['msj'] = "modi"; //Esto se agrega (no se encuentra en el index)
      $this->load->view('destino_view', $datos);
  }else
  {
  	$datos["destino"] = $this->destino_model->get_destino();
  	$datos["nombre_pais"] = $this->destino_model->get_nombre_pais();
    $datos['msj'] = "ErrorM"; //Esto se agrega (no se encuentra en el index)
    $this->load->view('destino_view', $datos);
  }

}
}

?>