<?php
	$db = mysqli_connect('localhost', 'root', '1234',  'mysitedb')or die('Fail');
	if(!$db){
		die('Error de conexión:' .mysqli_connect_error());
	}
	echo 'Conexion exitosa';
?>
