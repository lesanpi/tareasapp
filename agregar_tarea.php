<?php 
	echo "stringFuera";
	include("conexion.php");
	if ($_POST) {
		
		$titulo =  $_POST["idTituloInput"];
		$descripcion = $_POST["descripcionInput"];
		$prioridad = $_POST["prioridadInput"];
		$sql_agregar = 'INSERT INTO `tareas_user` (`id`, `id_persona`,`titulo`, `descripcion`, `prioridad`) VALUES (?,?,?,?,?)';
		echo $sql_agregar;
		$sentencia_agregar = $mbd->prepare($sql_agregar);
		$sentencia_agregar->execute(array(NULL,$id_user,$titulo, $descripcion, $prioridad));

		header('location:index.php');
	}
	
 ?>