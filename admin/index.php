<?php

    session_start();

    extract($_REQUEST);

    if(isset($_SESSION['usuario_logueado'])){
      header("location:home.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <?php
      if(isset($_SESSION['mensaje'])){
        print("<p>".$_SESSION['mensaje']."</p>");
        unset($_SESSION['mensaje']);
      }
    ?>

    <div class="row justify-content-center align-items-center g-2">
      <div class="col-4"></div>
      <div class="col-4">
        <br>
        <form action="login.php" method="post">
          <div class="card">
            <div class="card-header">
              Inicio de sesion
            </div>
            <div class="card-body">
              <h4 class="card-title">Diario Digital</h4>
              <div class="mb-3">
                <label for="" class="form-label">Usuario</label>
                <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId">
                <small id="helpId" class="form-text text-muted">Ingrese su usuario</small>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId">
                <small id="helpId" class="form-text text-muted">Ingrese su contraseña</small>
              </div>
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-4"></div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>