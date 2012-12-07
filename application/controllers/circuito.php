<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Circuito extends CI_controller{
	
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
	 public function get_circuitos()
    {
        $crud = new grocery_CRUD();
 
        $crud->set_table('circuito');
		$crud->columns('id_circuito','id_torneo','nombre_circuito','rankin_circuito','id_patrocinador');
		
        $output = $crud->render();
 
        $this->_example_output($output);                
    }
		
	function _example_output($output = null)
	
	{
	$this->load->view('usuarios.php',$output);    
	}
		
}