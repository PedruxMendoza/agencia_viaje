<?php 

defined("BASEPATH") OR exit("No direct script access allowed");

class reserva_model extends CI_Model{

	public function get_reserva(){
		$this->db->select('rv.id_reserva_viaje, CONCAT(t.nombre," " ,t.apellido) As turista, CONCAT(o.nombre_origen,", ",po.nombre_pais) AS origen, CONCAT(d.nombre_destino,", ",pd.nombre_pais) AS destino, CONCAT(v.fecha_salida, " ",v.hora_salida) As salida, CONCAT(v.fecha_llegada," ",v.hora_llegada) AS llegada, rv.fecha_inicial_reserva, rv.fecha_final_reserva, rv.num_asientos, e.nombre_estado'); 
		$this->db->from('reserva_viaje rv');
		$this->db->join('turistas t','t.dui_turista = rv.dui_turista');
		$this->db->join('agencia s','s.id_agencia = rv.id_agencia');
		$this->db->join('vuelos v','v.id_vuelo = rv.id_vuelo');
		$this->db->join('clase_vuelo cv','cv.id_clase = rv.id_clase');
		$this->db->join('estado e','e.id_estado = rv.id_estado');
		$this->db->join('origen o','o.id_origen = v.id_origen');
		$this->db->join('destino d', 'd.id_destino = v.id_destino');
		$this->db->join('pais po','po.id_pais = o.id_pais');
		$this->db->join('pais pd','pd.id_pais = d.id_pais');
		$exe = $this->db->get();

		return $exe->result();
	}

	public function eliminar($id){
		$this->db->select('v.id_vuelo, v.asientos_disponibles'); 
		$this->db->from('vuelos v');
		$this->db->join('reserva_viaje rv','rv.id_vuelo = v.id_vuelo');
		$this->db->where('rv.id_reserva_viaje', $id);
		$exe = $this->db->get();

		foreach ($exe->result() as $vuelo) {
			$id_vuelo = $vuelo->id_vuelo;
			$num_asientos = $vuelo->asientos_disponibles;
		}
		$suma = $num_asientos + 1;
		$this->db->set('asientos_disponibles', $suma);
		$this->db->where('id_vuelo', $id_vuelo);
		$this->db->update('vuelos');

		if ($this->db->affected_rows() > 0) {
			$this->db->where('id_reserva_viaje',$id);
			return ($this->db->delete('reserva_viaje'));
		}
	}

	public function get_turistas(){
		$exe = $this->db->get('turistas');
		return $exe->result();
	}
	
	public function get_sucursal(){
		$exe = $this->db->get('agencia');
		return $exe->result();
	}

	public function get_vuelos(){
		$this->db->select('v.id_vuelo, o.nombre_origen, d.nombre_destino'); 
		$this->db->from('vuelos v');
		$this->db->join('origen o','o.id_origen = v.id_origen');
		$this->db->join('destino d','d.id_destino = v.id_destino');
		$exe = $this->db->get();

		return $exe->result();
	}
	
	public function get_clases(){
		$exe = $this->db->get('clase_vuelo');
		return $exe->result();
	}

	public function get_estado(){
		$exe = $this->db->get('estado');
		return $exe->result();
	}	

	public function insertar($datos){
		$this->db->set('dui_turista',$datos['turista']);
		$this->db->set('id_agencia',$datos['sucursal']);
		$this->db->set('id_vuelo',$datos['vuelos']);
		$this->db->set('id_clase',$datos['clase']);
		$this->db->set('fecha_inicial_reserva',$datos['fecha_inicial_reserva']);
		$this->db->set('fecha_final_reserva',$datos['fecha_final_reserva']);
		$this->db->set('num_asientos',$datos['asientos']);
		$this->db->set('id_estado',$datos['estado']);
		$this->db->insert('reserva_viaje');

		$last_id = $this->db->insert_id();

		if ($this->db->affected_rows() > 0) {
			$this->db->select('v.id_vuelo, v.asientos_disponibles'); 
			$this->db->from('vuelos v');
			$this->db->join('reserva_viaje rv','rv.id_vuelo = v.id_vuelo');
			$this->db->where('rv.id_reserva_viaje', $last_id);
			$exe = $this->db->get();

			foreach ($exe->result() as $vuelo) {
				$id_vuelo = $vuelo->id_vuelo;
				$num_asientos = $vuelo->asientos_disponibles;
			}
			$resta = $num_asientos - 1;
			$this->db->set('asientos_disponibles', $resta);
			$this->db->where('id_vuelo', $id_vuelo);
			$this->db->update('vuelos');

			if ($this->db->affected_rows() > 0) {
				return 'success';
			}
		} 
	}


	public function get_datos($id){
		$this->db->where('id_reserva_viaje',$id);
		$exe = $this->db->get('reserva_viaje');
		return $exe->result();
	}

	public function actualizar($datos){
		$this->db->set('dui_turista',$datos['turista']);
		$this->db->set('id_agencia',$datos['sucursal']);
		$this->db->set('id_vuelo',$datos['vuelos']);
		$this->db->set('id_clase',$datos['clase']);
		$this->db->set('fecha_inicial_reserva',$datos['fecha_inicial_reserva']);
		$this->db->set('fecha_final_reserva',$datos['fecha_final_reserva']);
		$this->db->set('num_asientos',$datos['asientos']);
		$this->db->set('id_estado',$datos['estado']);
		$this->db->where('id_reserva_viaje', $datos['id']);
		$this->db->update('reserva_viaje');

		if ($this->db->affected_rows() > 0) {
			return 'modi';
		}
	}

	public function cancelar($id){
		$this->db->set('id_estado',2);
		$this->db->where('id_reserva_viaje', $id);
		$this->db->update('reserva_viaje');

		if ($this->db->affected_rows() > 0) {
			return 'cancel';
		}
	}

	public function reprogramar($id){
		$this->db->set('id_estado',3);
		$this->db->where('id_reserva_viaje', $id);
		$this->db->update('reserva_viaje');

		if ($this->db->affected_rows() > 0) {
			return 'repro';
		}
	}

}

?>