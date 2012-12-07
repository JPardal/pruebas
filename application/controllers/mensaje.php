<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mensaje extends CI_controller{
	
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
	 public function get_mensajes()
    {
        $crud = new grocery_CRUD();
 
        $crud->set_table('mensaje');
		$crud->columns('id_emisor','id_receptor','tipo_mensaje','texto_mensaje','fecha_mensaje');
		
        $output = $crud->render();
 
        $this->_example_output($output);                
    }
		
	function _example_output($output = null)
	
	{
	$this->load->view('usuarios.php',$output);    
	}
		
}