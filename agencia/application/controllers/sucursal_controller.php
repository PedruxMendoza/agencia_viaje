<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sucursal_controller extends CI_Controller {

	public $msj;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('sucursal_model');
	}	

	public function index()
	{
		/*$this->load->view('welcome_message');*/
		$datos['agencia'] = $this->sucursal_model->get_agencia();
		$datos['departamento'] = $this->sucursal_model->get_departamento();

		$this->load->view('sucursal_view', $datos);
	}

	public function eliminar($id)
	{
		$this->sucursal_model->eliminar($id);
		redirect('/sucursal_controller/index','refresh');
	}

	public function ingresar()
	{
		$datos["nombre"] = $_POST["nombre"];
		$datos["telefono"] = $_POST["telefono"];
		$datos["departamento"] = $_POST["departamento"];
		/*Aqui se pone los datos del agregar para mostrar el modal (copiar en cada controlador)*/
		$msj = $this->sucursal_model->guardar($datos);
		if ($msj == "success") {
			$datos['agencia'] = $this->sucursal_model->get_agencia(); //Estos esta en la funcion index
			$datos['departamento'] = $this->sucursal_model->get_departamento(); //Estos esta en la funcion index
			$datos['msj'] = "success";	//Esto se agrega (no se encuentra en el index)
			$this->load->view('sucursal_view', $datos);	//Estos esta en la funcion index

		}
		/*Aqui se termina de seleccionar para copiar*/
	}

	public function get_datos($id)
	{
		$datos['agencia'] = $this->sucursal_model->get_datos($id);
		$datos['departamento'] = $this->sucursal_model->get_departamento();
		
		$this->load->view('sucursal_viewact', $datos);
	}

	public function actualizar()
	{
		$datos["id"] = $_POST["id"];
		$datos["nombre"] = $_POST["nombre"];
		$datos["telefono"] = $_POST["telefono"];
		$datos["departamento"] = $_POST["departamento"];
		/*Aqui se pone los datos del actualizar para mostrar el modal (copiar en cada controlador)*/
		$msj = $this->sucursal_model->actualizar($datos);
		if ($msj == "modi") {
			$datos['agencia'] = $this->sucursal_model->get_agencia(); //Estos esta en la funcion index
			$datos['departamento'] = $this->sucursal_model->get_departamento(); //Estos esta en la funcion index
			$datos['msj'] = "modi"; //Esto se agrega (no se encuentra en el index)
			$this->load->view('sucursal_view', $datos); //Estos esta en la funcion index
		}else{
			$datos['agencia'] = $this->sucursal_model->get_agencia(); //Estos esta en la funcion index
			$datos['departamento'] = $this->sucursal_model->get_departamento(); //Estos esta en la funcion index
			$datos['msj'] = "ErrorM"; //Esto se agrega (no se encuentra en el index)
			$this->load->view('sucursal_view', $datos); //Estos esta en la funcion index			
		}
		/*Aqui se termina de seleccionar para copiar*/
	}
}

?>