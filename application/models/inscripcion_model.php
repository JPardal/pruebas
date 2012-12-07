<?php
class Inscripcion_model extends CI_Model {
		
	function __construct()
	{
		// Llamar al constructor de CI_Model
		parent::__construct();
	}
        
        public function get_inscritos($id_torneo)
        {
              $this->db->where('id_torneo', $id_torneo);
              $this->db->where('estado_inscripcion', 'OK');
            $query =  $this->db->get('inscripcion');
            return $query.result();
        }
}
?>
