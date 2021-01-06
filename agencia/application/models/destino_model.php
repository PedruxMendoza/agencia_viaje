<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class destino_model extends CI_Model{

  public function get_destino(){
    $this->db->select("d.id_destino,d.nombre_destino,p.nombre_pais");
    $this->db->from("destino d");
    $this->db->join("pais p","p.id_pais=d.id_pais");
    $exe = $this->db->get();
    return $exe->result(); 
  }

  public function get_nombre_pais(){
    $exe = $this->db->get("pais");
    return $exe->result();
  }

  public function eliminar($id){
    $this->db->where("id_destino",$id);
    return ($this->db->delete("destino"));
  }

  public function set_destino($datos){
    $this->db->set("nombre_destino", $datos["nombre_ciudad"]);
    $this->db->set("id_pais", $datos["nombre_pais"]);
    $this->db->INSERT("destino");
    if ($this->db->affected_rows() > 0) {
      return 'success';
    } 
  }
  public function get_datos($id){
    $this->db->where("id_destino",$id);
    $exe=$this->db->get("destino");
    return $exe->result();
  }

  public function actualizar($datos){
    $this->db->set("nombre_destino", $datos["nombre_ciudad"]);
    $this->db->set("id_pais", $datos["nombre_pais"]);
    $this->db->where("id_destino", $datos["id"]);
    $this->db->update("destino");
    if ($this->db->affected_rows() > 0) {
      return 'modi';
    }    
  }
}

?>