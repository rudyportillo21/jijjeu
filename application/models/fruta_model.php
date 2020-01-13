<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fruta_model extends CI_Model {
	public function get_fruta(){
		$this->db->select('f.id_fruta,f.nombre_fruta,c.nombre_color,s.nombre_sabor');
		$this->db->from('fruta f');
		$this->db->join('color c','c.id_color=f.id_color');
		$this->db->join('sabor s','s.id_sabor=f.id_sabor');
		$exe = $this->db->get();
		return $exe->result();
	}

	public function eliminar($id){
		$this->db->where('id_fruta',$id);
		$this->db->delete('fruta');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function get_color(){
		$exe = $this->db->get('color');
		return $exe->result();
	}

	public function get_sabor(){
		$exe = $this->db->get('sabor');
		return $exe->result();
	}

	public function set_fruta($datos){
		$this->db->set('nombre_fruta',$datos['fruta']);
		$this->db->set('id_color',$datos['color']);
		$this->db->set('id_sabor',$datos['sabor']);
		$this->db->insert('fruta');
		if($this->db->affected_rows()>0){
			return 'add';
		}
	}

	public function get_datos($id){
		$this->db->where('id_fruta',$id);
		$exe = $this->db->get('fruta');
		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	public function actualizar($datos){
		$this->db->set('nombre_fruta',$datos['fruta']);
		$this->db->set('id_color',$datos['color']);
		$this->db->set('id_sabor',$datos['sabor']);
		$this->db->where('id_fruta',$datos['id_fruta']);
		$this->db->update('fruta');
		if($this->db->affected_rows()>0){
			return 'edi';
		}
	}
}
