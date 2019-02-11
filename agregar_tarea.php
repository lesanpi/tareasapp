<?php 
	if ($_POST) {
		$titulo =  $_POST["idTituloInput"];
		$descripcion = $_POST["descripcionInput"];
		$prioridad = $_POST["prioridadInput"];

		$sql_agregar = 'INSERT INTO `tareas_user` (`id_persona`,`titulo`, `descripcion`, `prioridad`) VALUES (?,?,?,?)';
		$sentencia_agregar = $mbd->prepare($sql_agregar);
		$sentencia_agregar->execute(array(1,$titulo, $descripcion, $prioridad));
	}
	
 ?>