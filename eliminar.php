<?php 

	include_once 'conexion.php';

	$id = $_GET['id'];
	$sql_eliminar = 'DELETE FROM tareas_user WHERE id=?';
	$sentencia_eliminar = $mbd->prepare($sql_eliminar);
	$sentencia_eliminar->execute(array($id));
	header('location:index.php');

 ?>