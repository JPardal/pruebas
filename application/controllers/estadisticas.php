<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estadisticas extends CI_controller{
	
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
	 public function estadisticas()
    {
        $crud = new grocery_CRUD();
 
        $crud->set_table('estadisticas');
		$crud->columns('id_partida','id_usuario','id_deporte','estadistica1','estadistica2','estadistica3');
		
        $output = $crud->render();
 
        $this->_example_output($output);                
    }
		
	function _example_output($output = null)
	
	{
	$this->load->view('usuarios.php',$output);    
	}
		
}