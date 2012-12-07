<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_controller{
	
	function __constructor()
	{
		parent::__constructor();
		
		
	}
	
	public function index()
	{
		
	}
        public function es_jugador($id_usuario)
        {
            $this->load->model('Usuario_model');
            if($this->Usuario_model->get_usuario($id_usuario))
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
            
        }
		
}