<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patrocinador extends CI_controller{
	
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
	 public function get_patrocinadores()
    {
        $crud = new grocery_CRUD();
 
        $crud->set_table('patrocinador');
		$crud->columns('id_patrocinador','id_evento','nombre_patrocinador','src_patrocinador');
		
        $output = $crud->render();
 
        $this->_example_output($output);                
    }
		
	function _example_output($output = null)
	
	{
	$this->load->view('usuarios.php',$output);    
	}
		
}