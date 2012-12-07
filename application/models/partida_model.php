<?php
class Partida_model extends CI_Model {
		
	function __construct()
	{
		// Llamar al constructor de CI_Model
		parent::__construct();
	}


       public function insert_partidaBasica()
	{
            if($this->input->post('id_jugador1'))
            {
            $data = array(
                    'id_jugador1' => $this->input->post('id_jugador1'),
                    'id_jugador2' => $this->input->post('id_jugador2'),
                    'fecha_partida'=> $this->input->post('fecha_partida'),
                    );
            }else
            {
                $data = array(
                    'id_equipo1' => $this->input->post('id_equipo1'),
                    'id_equipo2' => $this->input->post('id_equipo2'),
                    'fecha_partida'=> $this->input->post('fecha_partida'),
                    );

             }              
          return  $this->db->insert('partida', $data);
	}
        public function insert_partidaTorneo($id_torneo,$id_jugador1,$id_jugador2,$id_equipo1,$id_equipo2,$fecha_partida)
	{
            if($this->input->post('id_jugador1'))
            {
            $data = array(
                    'id_jugador1' => $this->input->post('id_jugador1'),
                    'id_jugador2' => $this->input->post('id_jugador2'),
                    'fecha_partida'=> $this->input->post('fecha_partida'),
                    );
            }else
            {
                $data = array(
                    'id_equipo1' => $this->input->post('id_equipo1'),
                    'id_equipo2' => $this->input->post('id_equipo2'),
                    'fecha_partida'=> $this->input->post('fecha_partida'),
                    );

             }              
          return  $this->db->insert('partida', $data);
	}
        
        public function update_partidaBasica()
        {
      //  id_partida  id_jugador1  id_jugador2  fecha_partida  
      //  resultado_partida  estadisticas_partida  
      //  id_ganador  id_equipo1  id_equipo2  id_torneo  
		$data = array (
                    'resultado_partida' => $this->input->post('resultado_partida'),
                    'id_ganador' => $this->input->post('id_ganador'));
                $this->db->where('id_partida', $this->input->post('id_partida'));
	return	$this->db->update('usuario',$data);
	    
        }
}
?>
