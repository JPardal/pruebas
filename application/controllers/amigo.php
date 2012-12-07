<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Amigo extends CI_controller{
	
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
	 public function get_amigos()
    {
        $crud = new grocery_CRUD();
 
        $crud->set_table('amigo');
		$crud->columns('id_propio','id_amigo');
		
        $output = $crud->render();
 
        $this->_example_output($output);                
    }
		
	function _example_output($output = null)
	
	{
	$this->load->view('usuarios.php',$output);    
	}
		
}