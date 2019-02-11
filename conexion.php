<?php 
	$user = 'root';
    $password = 'root';
    $link = 'mysql:host=localhost;dbname=tareas';
    
    try{
    	$mbd = new PDO($link, $user, $password);
    	//echo "Conectado";
    }catch(PDOException $e){
    	print "¡Error!: " . $e->getMessage() . "<br/>";
    	die();
    }

        
?>