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
</head>
<body>
  <div class="container">
    <?php require("menu.php"); ?>
    <br>
    <div class="row align-items-md-stretch">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div
          class="h-100 p-5 text-white bg-secondary border rounded-3">
          <h2>Bienvenido</h2>
          <p>Este es el sistema interno de Diario Digital, utilice el panel para administrar los usuarios y sus publicaciones de manera sencilla.</p>
          <a class="btn btn-outline-light" href="manual.php" role="button">Manual de usuario</a>
        </div>
      </div>
    </div>
  </div>
  <script src="../lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>