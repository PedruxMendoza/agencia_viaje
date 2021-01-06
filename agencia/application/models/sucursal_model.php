<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sucursal_model extends CI_Model {

	public function get_agencia()
	{
		$this->db->select('s.nombre_agencia, s.telefono, d.nombre_departamento, s.id_agencia');
		$this->db->from('agencia s');
		$this->db->join('departamento d', 'd.id_departamento = s.id_departamento');

		$exe = $this->db->get();

		return $exe->result();
	}

	public function eliminar($id)
	{
		$this->db->where('id_agencia', $id);
		return ($this->db->delete('agencia'));
	}

	public function get_departamento()
	{
		$exe = $this->db->get('departamento');
		return $exe->result();
	}

	public function guardar($datos)
	{
		$this->db->set('nombre_agencia',$datos["nombre"]);
		$this->db->set('telefono',$datos["telefono"]);
		$this->db->set('id_departamento',$datos["departamento"]);
		$exe = $this->db->insert('agencia');
		/*Aqui comparamos para saber que datos se han cambiado (copiar esto en cada modelo)*/
		if ($this->db->affected_rows() > 0) {
			return 'success';
		}
		/*Aqui se termina de seleccionar para copiar*/
	}

	public function get_datos($id)
	{
		$this->db->where('id_agencia', $id);
		$exe = $this->db->get('agencia');
		return $exe->result();
	}

	public function actualizar($datos)
	{
		$this->db->set('nombre_agencia',$datos["nombre"]);
		$this->db->set('telefono',$datos["telefono"]);
		$this->db->set('id_departamento',$datos["departamento"]);
		$this->db->where('id_agencia',$datos["id"]);
		$this->db->update('agencia');
		/*Aqui comparamos para saber que datos se han cambiado (copiar esto en cada modelo)*/
		if ($this->db->affected_rows() > 0) {
			return 'modi';
		}
		/*Aqui se termina de seleccionar para copiar*/		
	}
}

?>