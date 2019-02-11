<?php 

	include("conexion.php");
	$id_persona = $_POST["id_user"]);
	//if (is_null($id_user)) {
	//	header('location:ingreso.php');
	//}
	$usuarios = 'SELECT * FROM `users` where id='. $id_user;
	$agent = $mbd->prepare($usuarios);
	$agent->execute();
	$resultado = $agent->fetchAll();
	$tareas = 'SELECT * FROM `tareas_user` WHERE id_persona='. $id_persona;
	$agent2 = $mbd->prepare($tareas);
	$agent2->execute();
	$resultado2 = $agent2->fetchAll();
	
	
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body class="bg-light">
  	<nav class="navbar navbar-light bg-light">
		  <a class="navbar-brand mx-auto" href="#">
		    <img src="/docs/4.2/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
		    <h1>Tareas</h1>
		  </a>
	</nav>
    <div class="container mt-1 mx-10">
    	
    	<div class="row" >
    		<div class="col-md-6 p-5 " >
	    			<?php foreach ($resultado as $dato){?>
	    			<div class="alert alert-light border" role="alert">
	    				<?php echo "<h2 class='text-uppercase text-body'>"; echo $dato['nombre']; echo "</h2>";?>
	    			</div> 
    				<?php } ?>
    				<form method="POST">
    					<div class="form-group">
						    <input class="form-control" id="idTituloInput" name="idTituloInput" placeholder="Titulo de la tarea">
						</div>
    					<div class="form-group">
						    <textarea class="form-control" id="descripcionInput" name="descripcionInput" rows="3" placeholder="Descripcion de la tarea"></textarea>
						</div>
						<div class="form-group">
						<label for="prioridadInput">Prioridad (Máxima = 1, Mínima = 3)</label>
					    <select class="form-control" id="prioridadInput" name="prioridadInput">
					      <option>1</option>
					      <option>2</option>
					      <option>3</option>					      
					    </select>
						</div>
					  	<button type="submit" class="btn btn-primary float-right" id="enviar">Enviar</button>
					</form>
					<?php 
						
							if ($_POST) {
							$titulo =  $_POST["idTituloInput"];
							$descripcion = $_POST["descripcionInput"];
							$prioridad = $_POST["prioridadInput"];

							$sql_agregar = 'INSERT INTO `tareas_user` (`id_persona`,`titulo`, `descripcion`, `prioridad`) VALUES (?,?,?,?)';
							$sentencia_agregar = $mbd->prepare($sql_agregar);
							$sentencia_agregar->execute(array($id_user,$titulo, $descripcion, $prioridad));

							header('location:index.php');
						}
	
 					?>
	    		</div>
	    		<div class="col-md-6 bg-white p-5 border">
    				<?php foreach ($resultado2 as $dato2){
    						if($dato2['prioridad']==1) $color = 'danger';
    						if($dato2['prioridad']==2) $color = 'warning';
    						if($dato2['prioridad']==3) $color = 'info'; ?>
		    			<div class='mb-5 alert alert-<?php echo $color ?>' role="alert">
		    				<?php echo "<h3>"; echo $dato2['titulo']; echo "</h3>";
		    				
		    					echo $dato2['descripcion'];
		    					echo "<br>";
		    				?>
		    				<a href='eliminar.php?id=<?php echo $dato2['id'] ?>'><button type="submit" class="btn float-right btn-light btn-outline-<?php echo $color ?>">Listo</button></a>
		    				
		    			</div> 
    				<?php } ?>
    			</div>
    		</div>
    	</div>
    	
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>