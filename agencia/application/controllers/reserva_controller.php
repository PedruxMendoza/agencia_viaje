<?php 

defined("BASEPATH") OR exit("No direct script access allowed");

class reserva_controller extends CI_Controller{

	public function __construct(){
		parent:: __construct();
		$this->load->model("reserva_model");
	}

	public function index(){
		$datos['reserva_viaje'] = $this->reserva_model->get_reserva();
		$datos['turista'] = $this->reserva_model->get_turistas();
		$datos['sucursal'] = $this->reserva_model->get_sucursal();
		$datos['vuelos'] = $this->reserva_model->get_vuelos();
		$datos['clase'] = $this->reserva_model->get_clases();
		$datos['estado'] = $this->reserva_model->get_estado();
		$this->load->view('reserva_view',$datos);
	}

	public function eliminar($id){
		$this->reserva_model->eliminar($id);
		redirect('/reserva_controller/index','refresh');
	}

	public function insertar(){
		$datos["turista"] = $_POST["turista"];
		$datos["sucursal"] = $_POST["sucursal"];
		$datos["vuelos"] = $_POST["vuelos"];
		$datos["clase"] = $_POST["clase"];
		$datos["fecha_inicial_reserva"] = $_POST["fecha_inicial_reserva"];
		$datos["fecha_final_reserva"] = $_POST["fecha_final_reserva"];
		$datos["asientos"] = $_POST["asientos"];
		$datos["estado"] = $_POST["estado"];

		$msj = $this->reserva_model->insertar($datos);
		if ($msj == "success") {
			$datos['reserva_viaje'] = $this->reserva_model->get_reserva();
			$datos['turista'] = $this->reserva_model->get_turistas();
			$datos['sucursal'] = $this->reserva_model->get_sucursal();
			$datos['vuelos'] = $this->reserva_model->get_vuelos();
			$datos['clase'] = $this->reserva_model->get_clases();
			$datos['estado'] = $this->reserva_model->get_estado();
      $datos['msj'] = "success";  //Esto se agrega (no se encuentra en el index)
      $this->load->view('reserva_view',$datos);
  }	

}

public function get_datos($id){
	$datos['reserva_viaje'] = $this->reserva_model->get_datos($id);
	$datos['turista'] = $this->reserva_model->get_turistas();
	$datos['sucursal'] = $this->reserva_model->get_sucursal();
	$datos['vuelos'] = $this->reserva_model->get_vuelos();
	$datos['clase'] = $this->reserva_model->get_clases();
	$datos['estado'] = $this->reserva_model->get_estado();
	$this->load->view('reserva_viewact',$datos);
}

public function actualizar(){
	$datos["id"] = $_POST["id"];
	$datos["turista"] = $_POST["turista"];
	$datos["sucursal"] = $_POST["sucursal"];
	$datos["vuelos"] = $_POST["vuelos"];
	$datos["clase"] = $_POST["clase"];
	$datos["fecha_inicial_reserva"] = $_POST["fecha_inicial_reserva"];
	$datos["fecha_final_reserva"] = $_POST["fecha_final_reserva"];
	$datos["asientos"] = $_POST["asientos"];
	$datos["estado"] = $_POST["estado"];

	$msj = $this->reserva_model->actualizar($datos);
	if ($msj == "modi") {
		$datos['reserva_viaje'] = $this->reserva_model->get_reserva();
		$datos['turista'] = $this->reserva_model->get_turistas();
		$datos['sucursal'] = $this->reserva_model->get_sucursal();
		$datos['vuelos'] = $this->reserva_model->get_vuelos();
		$datos['clase'] = $this->reserva_model->get_clases();
		$datos['estado'] = $this->reserva_model->get_estado();
      $datos['msj'] = "modi"; //Esto se agrega (no se encuentra en el index)
      $this->load->view('reserva_view',$datos);
  }else{
  	$datos['reserva_viaje'] = $this->reserva_model->get_reserva();
  	$datos['turista'] = $this->reserva_model->get_turistas();
  	$datos['sucursal'] = $this->reserva_model->get_sucursal();
  	$datos['vuelos'] = $this->reserva_model->get_vuelos();
  	$datos['clase'] = $this->reserva_model->get_clases();
  	$datos['estado'] = $this->reserva_model->get_estado();
    $datos['msj'] = "ErrorM"; //Esto se agrega (no se encuentra en el index)
    $this->load->view('reserva_view',$datos);  	
}

}


public function cancelar($id){
	$msj = $this->reserva_model->cancelar($id);
	if ($msj == "cancel") {
		$datos['reserva_viaje'] = $this->reserva_model->get_reserva();
		$datos['turista'] = $this->reserva_model->get_turistas();
		$datos['sucursal'] = $this->reserva_model->get_sucursal();
		$datos['vuelos'] = $this->reserva_model->get_vuelos();
		$datos['clase'] = $this->reserva_model->get_clases();
		$datos['estado'] = $this->reserva_model->get_estado();
      $datos['msj'] = "cancel"; //Esto se agrega (no se encuentra en el index)
      $this->load->view('reserva_view',$datos);
  }
}

public function reprogramar($id){
	$msj = $this->reserva_model->reprogramar($id);
	if ($msj == "repro") {
		$datos['reserva_viaje'] = $this->reserva_model->get_reserva();
		$datos['turista'] = $this->reserva_model->get_turistas();
		$datos['sucursal'] = $this->reserva_model->get_sucursal();
		$datos['vuelos'] = $this->reserva_model->get_vuelos();
		$datos['clase'] = $this->reserva_model->get_clases();
		$datos['estado'] = $this->reserva_model->get_estado();
      $datos['msj'] = "repro"; //Esto se agrega (no se encuentra en el index)
      $this->load->view('reserva_view',$datos);
  }
}

}

?>
