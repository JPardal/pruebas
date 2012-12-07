<?php
class Registro_model extends CI_Model {
		
	function __construct()
	{
		// Llamar al constructor de CI_Model
		parent::__construct();
	}
	function get_last_ten_entries()
	{
		//$query = $this->db->get('entries', 10);
		//return $query->result();
	}
	function insert_entry()
	{
		$data = array(
                            'email_usuario' => $this->input->post('email'),
                            'password_usuario' => $this->input->post('password'),
                            'activacion' => $this->input->post('activacion'));
            $this->db->insert('usuario', $data);
	}
	function update_entry()
	{
		$data = array ('activacion' => '0');
                $this->db->where('email_usuario', $this->input->post('email'));
                $this->db->where('activacion', $this->input->post('key'));
	return	$this->db->update('usuario',$data);
	}
	function ValidarEmail($email){         
	 //  Consulta Mysql para buscar en la tabla Usuario aquellos usuarios que coincidan con el mail y password ingresados en pantalla de login
	echo $email;
        $query = $this->db->where('email_usuario',$email);
        $query = $this->db->get('usuario');
        return $query->row();
	    //  Devolvemos al controlador la fila que coincide con la búsqueda. (FALSE en caso que no existir coincidencias)
	}
}

?>