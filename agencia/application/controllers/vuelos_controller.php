<?php 

defined("BASEPATH") OR exit("No direct script access allowed");

class vuelos_controller extends CI_Controller{

	public function __construct(){
		parent:: __construct();
		$this->load->model("vuelos_model");
	}

	public function index(){
		$datos['vuelos'] = $this->vuelos_model->get_vuelos();
		$datos['origen'] = $this->vuelos_model->get_origen();
		$datos['destino'] = $this->vuelos_model->get_destino();
		$datos['avion'] = $this->vuelos_model->get_avion();
		$this->load->view("vuelos_view", $datos);
	}

	public function eliminar($id){
		$this->vuelos_model->eliminar($id);
		redirect('/vuelos_controller/index','refresh');
	}

	public function insertar(){
		$datos["origen"] = $_POST["origen"];
		$datos["destino"] = $_POST["destino"];
		$datos["fecha_salida"] = $_POST["fecha_salida"];
		$datos["hora_salida"] = $_POST["hora_salida"];
		$datos["fecha_llegada"] = $_POST["fecha_llegada"];
		$datos["hora_llegada"] = $_POST["hora_llegada"];
		$datos["asientos_totales"] = $_POST["asientos_totales"];
		$datos["cod_avion"] = $_POST["cod_avion"];
		$datos["precio"] = $_POST["precio"];
		$msj = $this->vuelos_model->insertar($datos);
		if ($msj == "success") {
			$datos['vuelos'] = $this->vuelos_model->get_vuelos();
			$datos['origen'] = $this->vuelos_model->get_origen();
			$datos['destino'] = $this->vuelos_model->get_destino();
			$datos['avion'] = $this->vuelos_model->get_avion();
      $datos['msj'] = "success";  //Esto se agrega (no se encuentra en el index)
      $this->load->view("vuelos_view", $datos);
  }		
  
}

public function get_datos($id){
	$datos['vuelos'] = $this->vuelos_model->get_datos($id);
	$datos['origen'] = $this->vuelos_model->get_origen();
	$datos['destino'] = $this->vuelos_model->get_destino();
	$datos['avion'] = $this->vuelos_model->get_avion();
	$this->load->view("vuelos_viewact", $datos);
}

public function actualizar(){
	$datos["id"] = $_POST["id"];
	$datos["origen"] = $_POST["origen"];
	$datos["destino"] = $_POST["destino"];
	$datos["fecha_salida"] = $_POST["fecha_salida"];
	$datos["hora_salida"] = $_POST["hora_salida"];
	$datos["fecha_llegada"] = $_POST["fecha_llegada"];
	$datos["hora_llegada"] = $_POST["hora_llegada"];
	$datos["asientos_totales"] = $_POST["asientos_totales"];
	$datos["cod_avion"] = $_POST["cod_avion"];
	$datos["precio"] = $_POST["precio"];

	$msj = $this->vuelos_model->actualizar($datos);
	if ($msj == "modi") {
		$datos['vuelos'] = $this->vuelos_model->get_vuelos();
		$datos['origen'] = $this->vuelos_model->get_origen();
		$datos['destino'] = $this->vuelos_model->get_destino();
		$datos['avion'] = $this->vuelos_model->get_avion();
      $datos['msj'] = "modi"; //Esto se agrega (no se encuentra en el index)
      $this->load->view("vuelos_view", $datos);
  }else{
  	$datos['vuelos'] = $this->vuelos_model->get_vuelos();
  	$datos['origen'] = $this->vuelos_model->get_origen();
  	$datos['destino'] = $this->vuelos_model->get_destino();
  	$datos['avion'] = $this->vuelos_model->get_avion();
      $datos['msj'] = "ErrorM"; //Esto se agrega (no se encuentra en el index)
      $this->load->view("vuelos_view", $datos);	
  }

}
}

?>
