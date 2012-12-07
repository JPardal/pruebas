<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inscripcion extends CI_controller{
	
	function __constructor()
	{
		parent::__constructor();
		
		$this->load->database();
		$this->load->helper('url'); 
		$this->load->library('grocery_CRUD');   
	}
	
	public function index()
	{
		
	}
	 public function inscripciones()
    {
        $crud = new grocery_CRUD();
 
        $crud->set_table('inscripcion');
		$crud->columns('id_torneo','id_jugador','estado_inscripcion','comentario_inscripcion');
		
        $output = $crud->render();
 
        $this->_example_output($output);                
    }
		
	function _example_output($output = null)
	
	{
	$this->load->view('usuarios.php',$output);    
	}
		
}