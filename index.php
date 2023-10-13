<!doctype html>
<html lang="en">

<head>
  <title>Newspaper</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="lib/bootstrap-5.3.2/css/bootstrap.min.css">
</head>

<body>
  <header>
    <div class="container">
      <div class="row justify-content-center align-items-center g-2">
        <div class="col">
          <div class="bg-secondary bg-opacity-80 d-flex justify-content-center align-items-end" style="height: 150px;">
            <h1 class="display-1 text-warning" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">- - - - CITY Newspaper - - - -</h1>
          </div>
        </div>
      </div>
      <div class="row justify-content-center align-items-center g-2">
        <div class="col">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Secciones</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Portada</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Política</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Economía</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Deportes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Espectáculos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Policiales</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Interés General</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
        </div>
      </div>
    </div>
  </header>
  <main>
    <br>
    <div class="container">
    <div class="row g-2">
      <div class="col-2"> </div>
            <?php

                require("admin/conexion.php");

                $conexion = mysqli_connect ($server_db, $usuario_db, $password_db) or die ("No se puede conectar con el servidor");

                mysqli_select_db ($conexion, $base_db) or die ("No se puede seleccionar la base de datos");

                
                $instruccion2 = "select * from noticias order by fecha desc limit 1";

                
                $consulta2 = mysqli_query($conexion, $instruccion2) or die("No se pudo realizar la consulta");

                
                $nfilas2 = mysqli_num_rows($consulta2);

                for($i=0;$i<$nfilas2;$i++){
                    $resultado2 = mysqli_fetch_array($consulta2);
                    /*print('
                    <div class="col-9">
                        <div class="card" style="width: 100%; height: 100%; object-fit: cover;">
                            <img src="imagenes_subidas/'.$resultado2['imagen'].'" class="card-img-top" alt="'.$resultado2['titulo'].'">
                            <div class="card-body">
                                <h5 class="card-title">'.$resultado2['titulo'].'</h5>
                                <p class="card-text">'.$resultado2['copete'].'</p>
                                <a href="leer_noticia.php?id_noticia='.$resultado2['id_noticia'].'" class="btn btn-primary">Leer noticia</a>
                            </div>
                        </div>
                    </div>
                    ');*/

                    print('
                    <div class="col-8 d-flex justify-content-center align-items-center">
                    <div class="card mb-3">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img src="imagenes_subidas/'.$resultado2['imagen'].'" class="img-fluid rounded-start" alt="'.$resultado2['titulo'].'">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">'.$resultado2['titulo'].'</h5>
                            <p class="card-text">'.$resultado2['copete'].'</p>
                            <a href="leer_noticia.php?id_noticia='.$resultado2['id_noticia'].'" class="btn btn-primary">Leer noticia</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    ');
                }

                $instruccion = "select * from noticias order by fecha desc limit 9 offset 1";

                $consulta = mysqli_query($conexion, $instruccion) or die("No se pudo realizar la consulta");

                $nfilas = mysqli_num_rows($consulta);
    
                for($i=0;$i<$nfilas;$i++){
                    $resultado = mysqli_fetch_array($consulta);
                    print('
                    <div class="col-4">
                        <div class="card" style="width: 100%; height: 100%; object-fit: cover;">
                            <img id=imc src="imagenes_subidas/'.$resultado['imagen'].'" class="card-img-top h-100" alt="'.$resultado['titulo'].'">
                            <div class="card-body">
                                <h5 class="card-title">'.$resultado['titulo'].'</h5>
                                <p class="card-text">'.substr($resultado['copete'],0, 50).'...</p>
                                <a href="leer_noticia.php?id_noticia='.$resultado['id_noticia'].'" class="btn btn-primary">Leer noticia</a>
                            </div>
                        </div>
                    </div>
                    ');
                }

                mysqli_close($conexion);
            ?>
        </div>
    </div>
    <br>
  </main>
  <footer>
    <div class="container">
      <div class="row justify-content-center align-items-center g-2">
        <div class="col">
          <div class="bg-secondary bg-opacity-80 d-flex justify-content-around align-items-center" style="height: 50px;">
            <p class="text-white">COPYRIGHT 2023 </p>
            <p class="text-warning">- - - - CITY Newspaper - - - -</p>
            <p class="text-white">Todos los derechos reservados</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src="lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>