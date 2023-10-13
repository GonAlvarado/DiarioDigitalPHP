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
    <h1>Usuarios</h1>
    <?php
    
      if(isset($mensaje)){
        //print("<h4>".$mensaje."</h4>");
        print("<div class='alert alert-success' role='alert'><strong>".$mensaje."</strong></div>");
      }

    ?>
    <a name="" id="" class="btn btn-outline-primary" href="agregar_usuario.php" role="button">Agregar usuario</a>
    <br><br>

    <div class="row justify-content-center align-items-center g-2">
            <br>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Usuario</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

require("conexion.php");

$conexion = mysqli_connect ($server_db, $usuario_db, $password_db) or die ("No se puede conectar con el servidor");

mysqli_select_db ($conexion, $base_db) or die ("No se puede seleccionar la base de datos");

$instruccion = "select * from usuarios";

$consulta = mysqli_query($conexion, $instruccion) or die("No se pudo realizar la consulta");

$nfilas = mysqli_num_rows($consulta);

for($i=0;$i<$nfilas;$i++){
  $resultado = mysqli_fetch_array($consulta);
  print('
    <tr>
      <td>'.$resultado['nombre'].'</td>
      <td>'.$resultado['apellido'].'</td>
      <td>'.$resultado['usuario'].'</td>
      <td><a href="editar_usuario.php?id_usuario='.$resultado['id_usuario'].'" class="btn btn-secondary">editar</a></td>
      <td><a href="borrar_usuario.php?id_usuario='.$resultado['id_usuario'].'" class="btn btn-danger" onclick="return confirm(&quot; Desea eliminar? &quot;)">borrar</a></td>
    </tr>
  ');
}

mysqli_close($conexion);

?>
                        </tbody>
                    </table>
                </div>
            <br>
        </div>
  </div>
  <script src="../lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>