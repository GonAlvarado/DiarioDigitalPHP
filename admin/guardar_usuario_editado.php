<?php
    
    session_start();

    extract($_REQUEST);

    if(!isset($_SESSION['usuario_logueado'])){
      header("location:index.php");
    }

    require("conexion.php");

    $conexion = mysqli_connect ($server_db, $usuario_db, $password_db) or die ("No se puede conectar con el servidor");

    mysqli_select_db ($conexion, $base_db) or die ("No se puede seleccionar la base de datos");

    $usuario = mysqli_real_escape_string($conexion, $usuario);
    $password = mysqli_real_escape_string($conexion, $password);
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $apellido = mysqli_real_escape_string($conexion, $apellido);

    $salt = substr ($usuario, 0, 2);

    $clave_crypt = crypt($password, $salt);

    //$instruccion = "insert into usuarios (usuario, password, nombre, apellido) values ('$usuario', '$clave_crypt', '$nombre', '$apellido')";

    $instruccion = "UPDATE `usuarios` SET `usuario` = '$usuario', `password` = '$clave_crypt', `nombre` = '$nombre', `apellido` = '$apellido' WHERE `usuarios`.`id_usuario` = '$id_usuario'";

    //$instruccion = "update usuarios set usuario='$usuario', password='$clave_crypt', nombre='$nombre', apellido='$apellido' where id_usuario='$id_usuario'";

    $consulta = mysqli_query($conexion, $instruccion) or die("No se pudo guardar el usuario");

    mysqli_close($conexion);

    header("location:usuarios.php?mensaje=Cambios guardados con éxito");

?>