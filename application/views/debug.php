<?php
require_once('../../FirePHPCore/FirePHP.class.php');
ob_start();

//instanciar un objeto de la clase FirePHP
$mifirePHP = FirePHP::getInstance(true);
//evito que se muestren los mensajes en la consola de firebug
//$mifirePHP->setEnabled(false);
?>