<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class turista_model extends CI_Model {

	public function get_turista()
	{
		$this->db->select('t.dui_turista, t.nombre, t.apellido, t.direccion, t.telefono, t.pasaporte , s.nombre_sexo, p.nombre_pais');
		$this->db->from('turistas t');
		$this->db->join('sexo s', 's.id_sexo = t.id_sexo');
		$this->db->join('pais p', 'p.id_pais = t.id_pais');

		$exe = $this->db->get();

		return $exe->result();
	}

	public function eliminar($id)
	{
		$this->db->where('dui_turista', $id);
		return ($this->db->delete('turistas'));
	}

	public function get_sexo()
	{
		$exe = $this->db->get('sexo');
		return $exe->result();
	}

	public function get_pais()
	{
		$exe = $this->db->get('pais');
		return $exe->result();
	}	

	public function guardar($datos)
	{
		$DUI = $datos["DUI"];
		$DUI = str_replace("-","",$DUI);
		$this->db->set('dui_turista',$DUI);
		$this->db->set('nombre',$datos["nombre"]);
		$this->db->set('apellido',$datos["apellido"]);
		$this->db->set('direccion',$datos["direccion"]);
		$this->db->set('telefono',$datos["telefono"]);
		$this->db->set('pasaporte',$datos["pasaporte"]);
		$this->db->set('id_sexo',$datos["sexo"]);
		$this->db->set('id_pais',$datos["pais"]);
		$this->db->insert('turistas');

		if ($this->db->affected_rows() > 0) {
			return 'success';
		}  		
	}

	public function get_datos($id)
	{
		$this->db->where('dui_turista', $id);
		$exe = $this->db->get('turistas');
		return $exe->result();
	}

	public function actualizar($datos)
	{
		$this->db->set('nombre',$datos["nombre"]);
		$this->db->set('apellido',$datos["apellido"]);
		$this->db->set('direccion',$datos["direccion"]);
		$this->db->set('telefono',$datos["telefono"]);
		$this->db->set('pasaporte',$datos["pasaporte"]);
		$this->db->set('id_sexo',$datos["sexo"]);
		$this->db->set('id_pais',$datos["pais"]);
		$this->db->where('dui_turista',$datos["DUI"]);
		$this->db->update('turistas');

		if ($this->db->affected_rows() > 0) {
			return 'modi';
		}
		
	}
}

?>