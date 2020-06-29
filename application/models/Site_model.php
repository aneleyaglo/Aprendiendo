<?php
class Site_model extends CI_Model
{
	public function loginUser($data)
	{
		$this->db->select('*')	;	
		$this->db->from('profesores')	;
		$this->db->where('username',$data['username'])	;	
		$this->db->where('password',md5($data['password']))	;	
		
		$query = $this->db->get();
		
		if ($query->num_rows()>0) {
			return $query->result();
		}else{
			$this->db->select('*')	;
			$this->db->from('alumnos')	;
			$this->db->where('username',$data['username'])	;
			$this->db->where('password',md5($data['password']))	;	
			$queryAlumnos = $this->db->get();
			if ($queryAlumnos->num_rows()>0) {
				return $queryAlumnos->result();
				} 	
			return NULL;	
		}
	}
	
	public function insertProfesor(){
		
		$array = array(
			'nombre' => "Yelena",
			'apellido' => "Quijada",
			'curso' => "3",
			);
			
			$this->db->insert('profesores',$array);
		
	}
	
	public function getProfesores()
	{

		$this->db->select('*');
		$this->db->from('profesores');

		$query = $this->db->get();

		if ($query->num_rows()>0) {
			return $query->result();
		} else {
			return NULL;
		}
	}
	
	public function updateProfesor(){
		
		$array = array(
		'nombre' => "Olga",
		'apellido' => "Gomez",
		'curso' => "1",
		);
		
		$this->db->where('id',1);
		$this->db->update('profesores',$array);
		
		
	}
	
	function getAlumnos($curso)
	{
		$this->db->select('*');
		$this->db->from('alumnos');
		$this->db->where('curso',$curso);
		$this->db->where('deleted',0);

		$query = $this->db->get();
		
		if ($query->num_rows()>0) {
			return $query->result();
		} else {
			return NULL;
		}
		
	}
	function deleteAlumno($id)
	{
		$array = array(
		'deleted'=>1
		);
		$this->db->where('id',$id);
		$this->db->update('alumnos',$array);
		
	}
	
}
