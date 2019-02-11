<?php 

      include("conexion.php");


  
  
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Login - Tareas</title>

    <!-- Bootstrap core CSS -->
<link href="/docs/4.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="floating-labels.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container  my-5 w-50">
      <form class="form-signin" method="POST">
          <div class="text-center mb-5">
            
            <h1 class="h3 mb-3 font-weight-normal">App - Tareas</h1>

          </div>

          <div class="form-group">
            <input type="email" id="inputEmail" name="correo" class="form-control" placeholder="Email address" required autofocus>
          </div>

          <div class="form-group">
            <input type="password" id="inputPassword" name="contrasena" class="form-control" placeholder="Password" required>
          </div>

          <button class="btn btn-primary btn-block" type="submit">Sign in</button>
          
    </form>
      <?php 
      include("conexion.php");
      if ($_POST) {
              $correo =  $_POST["correo"];
              $contrasena = $_POST["contrasena"];
              $aux = '"' .  $correo . '"';
              $usuarios = 'SELECT * FROM `users` where correo=' . $aux;
              $agent = $mbd->prepare($usuarios);
              $agent->execute();
              $resultado = $agent->fetchAll();

              foreach ($resultado as $dato){
                if($dato['password'] == $contrasena){
                    $aux2 = '"' . $dato['id'] . '"';
                    $id_user = $dato['id'];
                    
                    session_start();
                    $_SESSION['id'] = $dato['id'];
                    $_SESSION['nombre'] = $dato['nombre'];
                    $_SESSION['correo'] = $dato['correo'];
                    
                    
                    header('location:index.php');
                }
              }

             



      } 
      ?>

     
  </div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
