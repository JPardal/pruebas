<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulario de registro</title>
</head>
<body>
<?php echo form_open('registro','',array('activacion'=> md5(uniqid(rand(), true)))); ?>
<h5>Email</h5>
<input type="text" name="email" value="<?php echo set_value('email'); ?>"size="50" />
<?php echo form_error('email'); ?>
<h5>Contraseña</h5>
<input type="password" name="password" value="<?php echo set_value('password'); ?>"size="50" />
<?php echo form_error('password'); ?>
<h5>Confirmar Contraseña</h5>
<input type="password" name="passconf" value="<?php echo set_value('passconf'); ?>"size="50" />
<?php echo form_error('passconf'); ?>
<div><input type="submit" value="Enviar" /></div>
</form>
</body>
</html>
