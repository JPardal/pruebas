<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Torneo extends CI_controller{
	
	function __constructor()
	{
		parent::__constructor();
		
		$this->load->database();
		$this->load->helper('url'); 
		$this->load->library('grocery_CRUD');   
	}
	
	public function index()
	{
		die();
	}
	 public function torneos()
    {
        $crud = new grocery_CRUD();
 
       $crud->set_table('torneo');
		$crud->columns(
                        'nombre_torneo',
                        'id_circuito',
                        'id_jugador',
                        'ciudad_torneo',
                        'provincia_torneo',
                        'direccion_torneo',
                        'categoria_torneo',
                        'sexo_torneo',
                        'nivel_torneo',
                        'id_formato',
                        'visibilidad_torneo',
                        'capacidad_torneo',
                        'edicion_torneo',
                        'id_patrocinador',
                        'id_organizador',
                        'id_partida',
                        'resultado_torneo',
                        'clasificacion_torneo',
                        'id_deporte',
                        'fechahora_torneo',
                        'tipo_torneo'
                            );
 
                $crud->display_as('id_deporte','Deporte');
                $crud->display_as('id_circuito','Circuito');
                $crud->display_as('id_formato','Formato');
                
                $crud->required_fields(
                        'nombre_torneo',
                        'formato_torneo',
                        'capacidad_torneo',
                        'id_organizador',
                        'id_deporte',
                        'tipo_torneo');
                
        $crud->set_relation('id_deporte','deporte','nombre_deporte');   
        $crud->set_relation('id_circuito','circuito','nombre_circuito');
        $crud->set_relation('id_formato','formato_torneo','nombre_formato');
        
        $crud->set_rules('nombre_torneo','nombre_torneo','trim|min_length[5]|max_length[12]|xss_clean');
	$crud->set_rules('formato_torneo','formato_torneo','trim|min_length[5]|max_length[12]|xss_clean');	
	$crud->set_rules('capacidad_torneo','capacidad_torneo','numeric');	
	$crud->set_rules('id_organizador','id_organizador','numeric');	
	$crud->set_rules('id_deporte','id_deporte','numeric');	
	$crud->set_rules('tipo_torneo','tipo_torneo','trim|xss_clean');	
       
        $output = $crud->render();
        
        $this->_example_output($output);                
    }
		
	function _example_output($output = null)
	{
	$this->load->view('example.php',$output);    
	}
	
        function crear_torneo_liga()
        {
            
        }
}