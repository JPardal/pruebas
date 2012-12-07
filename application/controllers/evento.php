<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Evento extends CI_controller{
	
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
	 public function eventos()
    {
        $crud = new grocery_CRUD();
 
        $crud->set_table('evento');
		$crud->columns('id_evento','id_circuito','id_torneo','id_partida','fecha_evento','descripcion_evento');
		
        $output = $crud->render();
 
        $this->_example_output($output);                
    }
		
	function _example_output($output = null)
	
	{
	$this->load->view('usuarios.php',$output);    
	}
		
}