<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partida extends CI_Controller{
	
	function __construct()
		{
		
		parent::__construct();
		
		/* Cargamos la base de datos */
		$this->load->database();
		
		/* Cargamos la libreria*/
		$this->load->library('grocery_crud');
		
		/* Añadimos el helper al controlador */
		$this->load->helper('url');
                
                $this->load->model('Partida_model');
		}

	 function index()
	  {
		/*
		 * Mandamos todo lo que llegue a la funcion
		 * administracion().
		 **/
		//redirect('productos/administracion');
	  }

	 public function get_partidas()
    {
        $crud = new grocery_CRUD();
 
        $crud->set_table('partida');
		$crud->columns(
                        'id_jugador1',
                        'id_jugador2',
                        'id_partida',
                        'fecha_partida',
                        'resultado_partida',
                        'estadisticas_partida',
                        'id_ganador',
                        'id_equipo1',
                        'id_equipo2',
                        'id_torneo'
		);
	
        $crud->required_fields('fecha_partida');
        $output = $crud->render();
// id_partida  id_jugador1  id_jugador2  fecha_partida  resultado_partida  estadisticas_partida  id_ganador  id_equipo1  id_equipo2  id_torneo
       $this->_example_output($output);                
    }
	public function update_partida($post_array,$primary_key)
	{
		$this->grocery_crud_model->db_update($post_array,$primary_key);
	}
	
	public function insert_partida($post_array)
	{
		$this->grocery_crud_model->db_insert($post_array);
	}
	public function delete_partida($primary_key)
	{
		$this->grocery_crud_model->db_delete($primary_key);
	}
	
	function _example_output($output = null)
	{
	$this->load->view('usuarios.php',$output);    
	}
	public function update_partidaBasica()
        {
            $this->load->view('partida_update');
            if($this->Partida_model->update_partidaBasica())
            {
                $this->load->view('update_ok');
            }
            else
            {
                $this->load->view('update_error');
            }
            
        }
        public function insert_partidaBasica()
        {
            //$this->load->view('partida_create');
            if($this->Partida_model->insert_partidaBasica())
            {
                 $this->load->view('insert_ok'); 
            }
            else
            {
                $this->load->view('insert_error');
            }
            
        }
}
