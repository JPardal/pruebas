<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DeportesPracticados extends CI_controller{
	
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
	 public function deportes_practicados()
    {
        $crud = new grocery_CRUD();
 
        $crud->set_table('deportes_practicados');
		$crud->columns('id_usuario','id_deporte','nivel_deporte_practicado','categoria_deporte_practicado');

	    $output = $crud->render();
 
        $this->_example_output($output);                
    }
		
	function _example_output($output = null)
	
	{
	$this->load->view('usuarios.php',$output);    
	}
		
}