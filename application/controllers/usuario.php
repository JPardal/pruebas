<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_controller{
	
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
	 public function usuarios()
    {
        $crud = new grocery_CRUD();
 
        $crud->set_table('usuario');
		$crud->columns('nombre_usuario','email_usuario','edad_usuario','sexo_usuario','nivel_usuario');

       
 
        $crud->display_as('nombre_usuario','Nombre');
        $crud->display_as('email_usuario','Email');
        $crud->display_as('edad_usuario','Edad');
		$crud->display_as('sexo_usuario','Sexo');
		$crud->display_as('nivel_usuario','Nivel');
		
		$crud->fields('Nombre','Email','Edad','Sexo','Nivel');
		
        $output = $crud->render();
 
        $this->_example_output($output);                
    }
		
	function _example_output($output = null)
	
	{
	$this->load->view('usuarios.php',$output);    
	}
		
}