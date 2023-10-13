<?php

    session_start();

    extract($_REQUEST);

    if(!isset($_SESSION['usuario_logueado'])){
      header("location:index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../lib/bootstrap-5.3.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>
  <div class="container">
    <?php require("menu.php"); ?>
    <h1>Nuevo usuario</h1>
    <form action="guardar_usuario.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" required>
      </div>
      <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" name="apellido" id="apellido" required>
      </div>
      <div class="mb-3">
        <label for="usuario" class="form-label">Usuario</label>
        <input type="text" class="form-control" name="usuario" id="usuario" onkeyup="comprobar_usuario(this.value)" required>
        <span id="mensaje"></span>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="enviar" name="enviar" value="loguearse">Enviar</button>
      </div>
    </form>
  </div>
  <div id="librerias">
    <script>
        function comprobar_usuario(str){
            if(str.length == 0){
                document.getElementById('mensaje').innerHTML = "";
                return;
            }else{
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        if(this.responseText == 1){
                            document.getElementById('enviar').disabled = true;
                            document.getElementById('mensaje').innerHTML = "No disponible";
                            document.getElementById('mensaje').style.color = "red";
                        }else{
                            document.getElementById('enviar').disabled = false;
                            document.getElementById('mensaje').innerHTML = "Disponible";
                            document.getElementById('mensaje').style.color = "green";
                        }
                    }
                };

                xmlhttp.open("GET", "comprobar_usuario.php?usuario=" + str, true);
                xmlhttp.send();
            }
        }   
    </script>
  </div>
  <script src="../lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>