<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

/**
* Index Page for this controller.
*
* Maps to the following URL
* 		http://example.com/index.php/welcome
*	- or -
* 		http://example.com/index.php/welcome/index
*	- or -
* Since this controller is set as the default controller in
* config/routes.php, it's displayed at http://example.com/
*
* So any other public methods not prefixed with an underscore will
* map to /index.php/welcome/<method_name>
* @see https://codeigniter.com/user_guide/general/urls.html
*/
	public function index()
	{
		/*$this->load->view('includes/footer');
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('home');*/
		$this->loadViews('home');	
	}

	public function hola()
	{
		$this->load->model('site_model');
		$this->site_model->updateProfesor();
	}
	
	public function login()
	{
	
		if ($_POST['username'] && $_POST['password']) {
			
			$login = $this->Site_model->loginUser($_POST);
			
			if ($login) {
				$array = array(
				'id'=>$login[0]->id,
				'Nombre'=>$login[0]->Nombre,
				'apellido'=>$login[0]->apellido,
				'curso'=>$login[0]->curso,
				'username'=>$login[0]->username,
				);
				
				//guardar el tipo de usuario, profesor o alumno
				if (isset($login[0]->is_profesor)) {
						$array['tipo']='profesor';
					} else if (isset($login[0]->is_alumno)) {
						$array['tipo']='alumno';		
				}
					  
				$this->session->set_userdata($array);
			}
		
		}
		
		$this->load->view('login');
	}
	
	function loadViews($view, $data=NULL)
	{
		print_r($_SESSION);
		// si tenemos sesion creada
		if ($_SESSION['username']) {
			
			//si la vista es login se redirige a la home
			if ($view=='login') {
				redirect(base_url().'Dashboard','location');
			}
			
			//si es una vista cualquiera, se carga
			$this->load->view('includes/footer');
			$this->load->view('includes/header');
			$this->load->view('includes/sidebar');
			$this->load->view($view,$data);
			
			//sino tenemos iniciada sesion
			} else {
				
				if ($view=='login') {
					$this->load->view($view);
				} else {
					redirect(base_url().'Dashboard/login','location');
			}
		}
	}
	
	function gestionAlumnos(){
				
		if ($_SESSION['tipo']=='profesor') {
			$data['alumnos']=$this->Site_model->getAlumnos($_SESSION['curso']);
			$this->loadViews('gestionAlumnos',$data);
		}else{
			redirect(base_url().'Dashboard','location');
		}
		
	}
	
	 function eliminarAlumno(){
			
		if ($_POST['idalumno']) {

			$this->Site_model->deleteAlumno($_POST['idalumno']);
		
		}
			
	}
	
	function crearTareas(){
		
		$this->loadViews('crearTarea');

	}

}
