<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Equipo extends CI_controller{
	
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
	 public function equipos()
    {
        $crud = new grocery_CRUD();
 
        $crud->set_table('equipo');
		$crud->columns('id_equipo','nombre_equipo','id_jugadores','id_creador','categoria_equipo');

        $output = $crud->render();
 
        $this->_example_output($output);                
    }
		
	function _example_output($output = null)
	
	{
	$this->load->view('usuarios.php',$output);    
	}
		
}