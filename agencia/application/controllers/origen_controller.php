<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class origen_controller extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model("origen_model");
	}

	public function index(){   
		$datos["origen"] = $this->origen_model->get_origen();
		$datos["nombre_pais"] = $this->origen_model->get_nombre_pais();
		$this->load->view('origen_view', $datos);
	}

	public function eliminar($id){
		$this->origen_model->eliminar($id);
		redirect("/origen_controller/index", "refresh");
	}

	public function insertar(){
		$datos["nombre_ciudad"]=$_POST["nombre_ciudad"];
		$datos["nombre_pais"]=$_POST["nombre_pais"];
		$msj = $this->origen_model->set_origen($datos);
		if ($msj == "success") {
			$datos["origen"] = $this->origen_model->get_origen();
			$datos["nombre_pais"] = $this->origen_model->get_nombre_pais();
      $datos['msj'] = "success";  //Esto se agrega (no se encuentra en el index)
      $this->load->view('origen_view', $datos);
  }

}

public function get_datos($id){
	$datos["origen"] = $this->origen_model->get_datos($id);
	$datos["nombre_pais"] = $this->origen_model->get_nombre_pais();
	$this->load->view('origen_viewact', $datos);
}

public function actualizar(){
	$datos["id"]=$_POST["id"];
	$datos["nombre_ciudad"]=$_POST["nombre_ciudad"];
	$datos["nombre_pais"]=$_POST["nombre_pais"];
	$msj = $this->origen_model->actualizar($datos);
	if ($msj == "modi") {
		$datos["origen"] = $this->origen_model->get_origen();
		$datos["nombre_pais"] = $this->origen_model->get_nombre_pais();
      $datos['msj'] = "modi"; //Esto se agrega (no se encuentra en el index)
      $this->load->view('origen_view', $datos);
  }else{
  	$datos["origen"] = $this->origen_model->get_origen();
  	$datos["nombre_pais"] = $this->origen_model->get_nombre_pais();
    $datos['msj'] = "ErrorM"; //Esto se agrega (no se encuentra en el index)
    $this->load->view('origen_view', $datos);  	
}

}
}

?>