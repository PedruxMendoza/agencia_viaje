<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class avion_controller extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model("avion_model");
	}
	public function index(){
		$datos["avion"] = $this->avion_model->get_avion();
		$datos["nombre_aeropuerto"] = $this->avion_model->get_nombre_aeropuerto();

		$this->load->view("avion_view", $datos);
	}
	public function eliminar($id){
		$this->avion_model->eliminar($id);
		redirect("/avion_controller/index","refresh");
	}
	public function ingresar(){
		$datos["nombre_cod_avion"]= $_POST["nombre_cod_avion"];
		$datos["capacidad"]= $_POST["capacidad"];
		$datos["num_asientos"]= $_POST["num_asientos"];
		$datos["nombre_aeropuerto"]= $_POST["nombre_aeropuerto"];

		$msj = $this->avion_model->set_avion($datos);
		if ($msj == "success") {
			$datos["avion"] = $this->avion_model->get_avion();
			$datos["nombre_aeropuerto"] = $this->avion_model->get_nombre_aeropuerto();
      $datos['msj'] = "success";  //Esto se agrega (no se encuentra en el index)
      $this->load->view("avion_view", $datos);
  }

}
public function get_datos($id){

	$datos["avion"] = $this->avion_model->get_datos($id);
	$datos["nombre_aeropuerto"] =  $this->avion_model->get_nombre_aeropuerto();
	$this->load->view("avion_viewAct", $datos);

}
public function actualizar(){
	$datos["id"] = $_POST["id"];
	$datos["nombre_cod_avion"]= $_POST["nombre_cod_avion"];
	$datos["capacidad"]= $_POST["capacidad"];
	$datos["num_asientos"]= $_POST["num_asientos"];
	$datos["nombre_aeropuerto"]= $_POST["nombre_aeropuerto"];

	$msj = $this->avion_model->actualizar($datos);
	if ($msj == "modi") {
		$datos["avion"] = $this->avion_model->get_avion();
		$datos["nombre_aeropuerto"] = $this->avion_model->get_nombre_aeropuerto();
      $datos['msj'] = "modi"; //Esto se agrega (no se encuentra en el index)
      $this->load->view("avion_view", $datos);
  }else{
  	$datos["avion"] = $this->avion_model->get_avion();
  	$datos["nombre_aeropuerto"] = $this->avion_model->get_nombre_aeropuerto();
    $datos['msj'] = "ErrorM"; //Esto se agrega (no se encuentra en el index)
    $this->load->view('reserva_view',$datos);  	
}
}

}