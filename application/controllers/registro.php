<?php
class Registro extends CI_Controller {
    
    
    function __constructor()
	{
		parent::__constructor();   
	}
    
    function index()
	{
                $this->load->model('Registro_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Contraseña','trim|required|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Confirmar Contraseña','trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check');
                $this->form_validation->set_message('required', 'El campo %s debe tener valor');
                $this->form_validation->set_message('valid_email', 'El campo %s debe ser un email válido');
		$this->form_validation->set_message('matches',"La contraseña introducida no coincide con la anterior");	
                //$this->form_validation->set_message('email','El email introducido ya esta registrado');
                $this->form_validation->set_message('email_check','El email introducido ya esta registrado');
                if ($this->form_validation->run() == FALSE)
			{
                            $this->load->view('registro.php');}
			else
			{
                           // $this->Registro_model->insert_entry();
                            $this->load->view('form_success.php');
			}
	}
	
	function email_check()
	{
               
		$email = $this->input->post('email');
                $activacion = $this->input->post('activacion');
                //if (!$this->Registro_model->ValidarEmail($email))
		//{
                    $this->load->library('email','','correo');
                    $this->correo->from('info@esportics.com', 'eSportics');
                    $this->correo->to($email);
                    $this->correo->subject('Bienvenido a eSportics');
                    $mensaje = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<style type="text/css"> 
		p { font-family:Calibri; font-size:18px; font-weight:bold;
		}
		#logo {
			align:right;
			margin-left: 200px;
			} 
        #cuerpo {
            height:450px;
			width:350px;
			align:left;
			position: absolute;			
            }
		</style>
	
		<title>eSportics</title>
		</head>
		<body>
		 
   <div id="cuerpo">
		
	
	    <table width="700">

      <tr>
        <td><p> Muchas gracias por registrarte en eSportics </p>
        
        <p> Pinche el siguiente link para activar la cuenta:</p>
                 <p><a href="';
                    $mensaje .= base_url().'/index.php/activate?email='.urlencode($email)."&key=".$activacion;
                    $mensaje .='" target="_blank" title="Pincha aqui">Pincha aqui</a></p>  
                        
                <p> Puedes mantenerte informado de nuestros avances en: </p>
		
		<p> Facebook: <a href=\'http://www.facebook.com/eSportics\' target=\'_blank\' title=\'Sígueme en Facebook\'><img src=\'http://quesabis.bligoo.cl/media/users/8/441100/images/public/34362/icono-facebook.png?v=1344599754904\' width="24" height="24" alt="" style="position:relative" /></a></p>
		<p> Twitter: <a href=\'https://twitter.com/eSportics\' target=\'_blank\' title=\'Sígueme en Twitter\'><img src=\'http://www.nu.org.bo/portals/0/OIM/icono_twitter.png\' width="24" height="24" alt="" style="position:relative"/></a> </p>
		<p> Mail: <A HREF="mailto:info@esportics.com" target=\'_blank\' title=\'info@esportics.com\'><img src="http://www.fifcomputer.com/3.0/images/logo-Mail.png" width="24" height="24" alt="" style="position:relative"/></a> </p></td>
       </td>
        <td> <a href=\'http://www.esportics.com\'><img src=\'http://www.esportics.com/images/logo.png\'/ align="left"></a></td>
      <tr>
        
    </table>
	</div>
		</body>
		</html>';
                    echo "Mensaje: ".$mensaje;
                    $this->correo->message($mensaje);
                    if($this->correo->send())
                    {
                     echo 'Correo enviado';
                    }
                    else
                    {
                     show_error($this->correo->print_debugger());
                    }
                       
                        return true;
               // }
              //  else
              //  {
                    //    return false;
               // }
	}
}
?>