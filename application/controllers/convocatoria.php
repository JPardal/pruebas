<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Convocatoria extends CI_controller{
	
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
	 public function convocatoria()
    {
        $crud = new grocery_CRUD();
 
        $crud->set_table('convocatoria');
		$crud->columns('id_usuario_entrenador','id_evento','id_usuario');
		
        $output = $crud->render();
 
        $this->_example_output($output);                
    }
		
	function _example_output($output = null)
	
	{
	$this->load->view('usuarios.php',$output);    
	}
		
}