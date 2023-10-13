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
    <h1>Editar noticia</h1>
    <?php
    
      if(isset($mensaje)){
        //print("<h3>".$mensaje."</h3>");
        print("<div class='alert alert-success' role='alert'><strong>".$mensaje."</strong></div>");
      }

    ?>
    <?php
        require("conexion.php");

        $conexion = mysqli_connect ($server_db, $usuario_db, $password_db) or die ("No se puede conectar con el servidor");
    
        mysqli_select_db ($conexion, $base_db) or die ("No se puede seleccionar la base de datos");

        $instruccion = "select * from noticias where id_noticia=$id_noticia";

        $consulta = mysqli_query($conexion, $instruccion) or die("No se pudo realizar la consulta");

        $resultado = mysqli_fetch_array($consulta);
    ?>
    <form action="guardar_edicion.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" name="titulo" id="titulo" required value="<?php print($resultado['titulo']); ?>">
      </div>
      <div class="mb-3">
        <label for="copete" class="form-label">Copete</label>
        <input type="text" class="form-control" name="copete" id="copete" required value="<?php print($resultado['copete']); ?>">
      </div>
      <div class="mb-3">
        <label for="cuerpo" class="form-label">Cuerpo</label>
        <textarea class="form-control" name="cuerpo" id="cuerpo" required><?php print($resultado['cuerpo']); ?></textarea>
      </div>
      <div class="mb-3">
        <label for="imagen" class="form-label">Imagen</label>
        <input type="file" class="form-control" name="imagen" id="imagen">
        <img src="../imagenes_subidas/<?php print($resultado['imagen']); ?>" width="80px">
      </div>
      <div class="mb-3">
        <label for="categoria" class="form-label">Categoría</label>
        <select class="form-control" name="categoria" id="categoria" required>
            <option value="deportes" <?php if($resultado['categoria']=='deportes') print('selected'); ?>>Deportes</option>
            <option value="politica" <?php if($resultado['categoria']=='politica') print('selected'); ?>>Política</option>
            <option value="economia" <?php if($resultado['categoria']=='economia') print('selected'); ?>>Economía</option>
            <option value="espectaculos" <?php if($resultado['categoria']=='espectaculos') print('selected'); ?>>Espectáculos</option>
            <option value="policiales" <?php if($resultado['categoria']=='policiales') print('selected'); ?>>Policiales</option>
            <option value="general" <?php if($resultado['categoria']=='general') print('selected'); ?>>Interés General</option>
        </select>
      </div>
      <div class="mb-3">
        <input type="hidden" name="imagencita" value="<?php print($resultado['imagen']); ?>">
        <input type="hidden" name="id_noticia" value="<?php print($resultado['id_noticia']); ?>">
        <button type="submit" class="btn btn-warning" id="enviar" name="enviar" value="loguearse">Actualizar</button>
        <a href="noticias.php" class="btn btn-success">Finalizar</a>
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