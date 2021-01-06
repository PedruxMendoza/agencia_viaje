<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class origen_model extends CI_Model{

  public function get_origen(){
    $this->db->select("o.id_origen,o.nombre_origen,p.nombre_pais");
    $this->db->from("origen o");
    $this->db->join("pais p","p.id_pais=o.id_pais");
    $exe = $this->db->get();
    return $exe->result(); 
  }

  public function get_nombre_pais(){
    $exe = $this->db->get("pais");
    return $exe->result();
  }

  public function eliminar($id){
    $this->db->where("id_origen",$id);
    return ($this->db->delete("origen"));
  }

  public function set_origen($datos){
    $this->db->set("nombre_origen", $datos["nombre_ciudad"]);
    $this->db->set("id_pais", $datos["nombre_pais"]);
    $this->db->INSERT("origen");
    if ($this->db->affected_rows() > 0) {
      return 'success';
    } 
  }

  public function get_datos($id){
    $this->db->where("id_origen",$id);
    $exe=$this->db->get("origen");
    return $exe->result();
  }

  public function actualizar($datos){
    $this->db->set("nombre_origen", $datos["nombre_ciudad"]);
    $this->db->set("id_pais", $datos["nombre_pais"]); 
    
    $this->db->where("id_origen", $datos["id"]);
    $this->db->update("origen");

    if ($this->db->affected_rows() > 0) {
      return 'modi';
    }
  }
}

?>