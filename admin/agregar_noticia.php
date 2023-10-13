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
    <h1>Nueva noticia</h1>
    <form action="guardar_noticia.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" name="titulo" id="titulo" required>
      </div>
      <div class="mb-3">
        <label for="copete" class="form-label">Copete</label>
        <input type="text" class="form-control" name="copete" id="copete" required>
      </div>
      <div class="mb-3">
        <label for="cuerpo" class="form-label">Cuerpo</label>
        <textarea class="form-control" name="cuerpo" id="cuerpo" required></textarea>
      </div>
      <div class="mb-3">
        <label for="imagen" class="form-label">Imagen</label>
        <input type="file" class="form-control" name="imagen" id="imagen" required>
      </div>
      <div class="mb-3">
        <label for="categoria" class="form-label">Categoría</label>
        <select class="form-control" name="categoria" id="categoria" required>
            <option value="deportes">Deportes</option>
            <option value="politica">Política</option>
            <option value="economia">Economía</option>
            <option value="espectaculos">Espectáculos</option>
            <option value="general">Interés General</option>
            <option value="general">Policiales</option>
        </select>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary" id="enviar" name="enviar" value="loguearse">Enviar</button>
      </div>
    </form>
  </div>
  <div id="librerias">
    <script>
      $(document).ready(function() {
        $('#cuerpo').summernote();
      });
    </script>
  </div>
  <script src="../lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>