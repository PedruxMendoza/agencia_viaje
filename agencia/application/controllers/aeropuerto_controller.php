<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class aeropuerto_controller extends CI_Controller {

  public function __construct(){
    parent:: __construct();
    $this->load->model("aeropuerto_model");

  }

  public function index(){
   $datos["aeropuerto"] = $this->aeropuerto_model->get_aeropuerto();
   $this->load->view("aeropuerto_view", $datos);

 }

 public function eliminar($id){
  $this->aeropuerto_model->eliminar($id);
  redirect("/aeropuerto_controller/index","refresh");

}

public function ingresar(){
  $datos["nombre_aeropuerto"] = $_POST["nombre_aeropuerto"];
  $datos["direccion"] = $_POST["direccion"];
  $datos["telefono"] = $_POST["telefono"];
  
  $msj = $this->aeropuerto_model->set_aeropuerto($datos);
  if ($msj == "success") {
      $datos['aeropuerto'] = $this->aeropuerto_model->get_aeropuerto(); //Estos esta en la funcion indexs
      $datos['msj'] = "success";  //Esto se agrega (no se encuentra en el index)
      $this->load->view('aeropuerto_view', $datos);
    }

  }

  public function get_datos($id){
    $datos["aeropuerto"] = $this->aeropuerto_model->get_datos($id);
    $this->load->view("aeropuerto_viewAct", $datos);

  }

  public function actualizar(){
    $datos["id"] = $_POST["id"];
    $datos["nombre_aeropuerto"] = $_POST["nombre_aeropuerto"];
    $datos["direccion"] = $_POST["direccion"];
    $datos["telefono"] = $_POST["telefono"];
    /*Aqui se pone los datos del actualizar para mostrar el modal (copiar en cada controlador)*/
    $msj = $this->aeropuerto_model->actualizar($datos);
    if ($msj == "modi") {
      $datos['aeropuerto'] = $this->aeropuerto_model->get_aeropuerto(); //Estos esta en la funcion indexs
      $datos['msj'] = "modi"; //Esto se agrega (no se encuentra en el index)
      $this->load->view('aeropuerto_view', $datos);//Estos esta en la funcion index
    }else{
      $datos['aeropuerto'] = $this->aeropuerto_model->get_aeropuerto(); //Estos esta en la funcion indexs
      $datos['msj'] = "ErrorM"; //Esto se agrega (no se encuentra en el index)
      $this->load->view('aeropuerto_view',$datos);   
    }
    /*Aqui se termina de seleccionar para copiar*/
  }
}
?>