<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class avion_model extends CI_model{

  public function get_avion(){
   $this->db->select("  av.cod_avion, av.nombre_cod_avion, av.capacidad, av.num_asientos, ae.nombre_aeropuerto");
   $this->db->FROM(" avion av");
   $this->db->join(" aeropuerto ae "," ae.id_aeropuerto = av.id_aeropuerto");

   $exe = $this->db->get();

   return $exe->result(); 
 }
 public function eliminar($id){
  $this->db->where("cod_avion",$id);
  return ($this->db->DELETE("avion"));
}
public function get_nombre_aeropuerto(){
  $exe= $this->db->get("aeropuerto");
  return $exe->result();
}
public function set_avion($datos){
  $this->db->set("nombre_cod_avion", $datos["nombre_cod_avion"]);
  $this->db->set("capacidad", $datos["capacidad"]);
  $this->db->set("num_asientos", $datos["num_asientos"]);
  $this->db->set("id_aeropuerto", $datos["nombre_aeropuerto"]);
  $this->db->INSERT("avion");
  if ($this->db->affected_rows() > 0) {
    return 'success';
  }            
}

public function get_datos($id){
  $this->db->where("cod_avion",$id);
  $exe=$this->db->get("avion");
  return $exe->result();
}
public function actualizar($datos){
  $this->db->set("nombre_cod_avion", $datos["nombre_cod_avion"]);
  $this->db->set("capacidad", $datos["capacidad"]);
  $this->db->set("num_asientos", $datos["num_asientos"]);
  $this->db->set("id_aeropuerto", $datos["nombre_aeropuerto"]);
  

  $this->db->where("cod_avion",$datos["id"]);
  $this->db->update("avion");

  if ($this->db->affected_rows() > 0) {
    return 'modi';
  }
}


}