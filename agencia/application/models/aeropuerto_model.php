<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class aeropuerto_model extends CI_model{

  public function get_aeropuerto(){
   $this->db->select(" a.id_aeropuerto, a.nombre_aeropuerto, a.direccion, a.telefono");
   $this->db->FROM("aeropuerto a");

   $exe = $this->db->get();

   return $exe->result(); 
 }
 public function eliminar($id){
   $this->db->where("id_aeropuerto",$id);
   return ($this->db->delete("aeropuerto"));
 }
 public function set_aeropuerto($datos){
  $this->db->set("nombre_aeropuerto", $datos["nombre_aeropuerto"]);
  $this->db->set("direccion", $datos["direccion"]);
  $this->db->set("telefono", $datos["telefono"]);
  $this->db->INSERT("aeropuerto");

  if ($this->db->affected_rows() > 0) {
    return 'success';
  }
}
public function get_datos($id){
  $this->db->where("id_aeropuerto",$id);
  $exe=$this->db->get("aeropuerto");
  return $exe->result();
}
public function actualizar($datos){
  $this->db->set("nombre_aeropuerto", $datos["nombre_aeropuerto"]);
  $this->db->set("direccion", $datos["direccion"]);
  $this->db->set("telefono", $datos["telefono"]);
  
  $this->db->where("id_aeropuerto",$datos["id"]);
  $this->db->update("aeropuerto");
  if ($this->db->affected_rows() > 0) {
    return 'modi';
  }
}

}






