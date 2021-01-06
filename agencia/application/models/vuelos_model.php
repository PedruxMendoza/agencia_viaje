<?php 

defined("BASEPATH") OR exit("No direct script access allowed");

class vuelos_model extends CI_Model{

	public function get_vuelos(){
		$this->db->select('v.id_vuelo, o.nombre_origen, d.nombre_destino,v.fecha_salida,v.hora_salida, v.fecha_llegada,v.hora_llegada,v.asientos_disponibles, a.nombre_cod_avion, v.precio');
		$this->db->from('vuelos v');
		$this->db->join('origen o', 'o.id_origen = v.id_origen');
		$this->db->join('destino d', 'd.id_destino = v.id_destino');
		$this->db->join('avion a', 'a.cod_avion = v.cod_avion');
		$exe = $this->db->get();

		return $exe->result();
	}

	public function eliminar($id){
		$this->db->where('id_vuelo',$id);
		return ($this->db->delete('vuelos'));
	}

	public function get_origen(){
		$exe = $this->db->get('origen');
		return $exe->result();
	}
	public function get_destino(){
		$exe = $this->db->get('destino');
		return $exe->result();
	}
	public function get_avion(){
		$exe = $this->db->get('avion');
		return $exe->result();
	}

	public function insertar($datos){
		$this->db->set('id_origen',$datos['origen']);
		$this->db->set('id_destino',$datos['destino']);
		$this->db->set('fecha_salida',$datos['fecha_salida']);
		$this->db->set('hora_salida',$datos['hora_salida']);
		$this->db->set('fecha_llegada',$datos['fecha_llegada']);
		$this->db->set('hora_llegada',$datos['hora_llegada']);
		$this->db->set('hora_salida',$datos['hora_salida']);
		$this->db->set('asientos_disponibles',$datos['asientos_totales']);
		$this->db->set('cod_avion',$datos['cod_avion']);
		$this->db->set('precio',$datos['precio']);
		$this->db->insert('vuelos');

		if ($this->db->affected_rows() > 0) {
			return 'success';
		}  		
	}

	public function get_datos($id){
		$this->db->where('id_vuelo',$id);
		$exe = $this->db->get('vuelos');
		return $exe->result();
	}

	public function actualizar($datos){
		$this->db->set('id_origen',$datos['origen']);
		$this->db->set('id_destino',$datos['destino']);
		$this->db->set('fecha_salida',$datos['fecha_salida']);
		$this->db->set('hora_salida',$datos['hora_salida']);
		$this->db->set('fecha_llegada',$datos['fecha_llegada']);
		$this->db->set('hora_llegada',$datos['hora_llegada']);
		$this->db->set('hora_salida',$datos['hora_salida']);
		$this->db->set('asientos_disponibles',$datos['asientos_totales']);
		$this->db->set('cod_avion',$datos['cod_avion']);
		$this->db->set('precio',$datos['precio']);
		$this->db->where('id_vuelo', $datos['id']);
		$this->db->update('vuelos');

		if ($this->db->affected_rows() > 0) {
			return 'modi';
		}
	}
}

?>