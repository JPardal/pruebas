<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activate extends CI_controller{
    function __constructor()
    {
            parent::__constructor();
    }
    public function index()
    {
    $this->load->model('Registro_model');
   
    if($this->Registro_model->update_entry())   
    {
        $this->load->view('activado.php');
    }
    else 
    {
        $this->load->view('noactivado.php');
    }
    }
}
?>
