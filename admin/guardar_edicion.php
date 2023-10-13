<?php
    
    session_start();

    extract($_REQUEST);

    if(!isset($_SESSION['usuario_logueado'])){
      header("location:index.php");
    }

    require("conexion.php");

    $conexion = mysqli_connect ($server_db, $usuario_db, $password_db) or die ("No se puede conectar con el servidor");

    mysqli_select_db ($conexion, $base_db) or die ("No se puede seleccionar la base de datos");

    $titulo = mysqli_real_escape_string($conexion, $titulo);
    $copete = mysqli_real_escape_string($conexion, $copete);
    $cuerpo = mysqli_real_escape_string($conexion, $cuerpo);

    $copiar_archivo = false;

    if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
        $directorio = "../imagenes_subidas/";
        $id_unico = time();
        $nombre_fichero = $id_unico. "-" .$_FILES['imagen']['name'];
        $copiar_archivo = true;
    }else{
        $nombre_fichero = $imagencita;
    }

    if($copiar_archivo){
        unlink($directorio.$imagencita);
        move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio.$nombre_fichero);
    }

    //$fecha = date("Y-m-d");

    //$id_usuario = $_SESSION['id_usuario'];

    $instruccion = "update noticias set titulo='$titulo', copete='$copete', cuerpo='$cuerpo', imagen='$nombre_fichero', categoria='$categoria' where id_noticia='$id_noticia'";

    $consulta = mysqli_query($conexion, $instruccion) or die("No se pudo guardar la noticia");

    mysqli_close($conexion);

    header("location:editar_noticia.php?mensaje=Los cambios se han guardado con éxito&id_noticia=".$id_noticia)

?>