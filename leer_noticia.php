<!doctype html>
<html lang="en">

<head>
  <title>Newspaper</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <div class="row justify-content-center g-2">
            <?php
                extract($_REQUEST);
                require("admin/conexion.php");
                $conexion = mysqli_connect ($server_db, $usuario_db, $password_db) or die ("No se puede conectar con el servidor");
                mysqli_select_db ($conexion, $base_db) or die ("No se puede seleccionar la base de datos");
                $instruccion = "select * from noticias where id_noticia=".$id_noticia;
                $consulta = mysqli_query($conexion, $instruccion) or die("No se pudo realizar la consulta");
                $nfilas = mysqli_num_rows($consulta);

                for($i=0;$i<$nfilas;$i++){
                    $resultado = mysqli_fetch_array($consulta);
                    print('
                        <div class="col">
                            <div class="card" style="width: 100%; height: 100%; object-fit: cover;">
                                <div class="card-body">
                                    <h1 class="card-title">'.$resultado['titulo'].'</h1>
                                    <br><br>
                                    <h3 class="card-title">'.$resultado['copete'].'</h3>
                                    <br><br>
                                    <img src="imagenes_subidas/'.$resultado['imagen'].'" class="img-fluid mx-auto d-block height-30" alt="'.$resultado['titulo'].'">
                                    <br><br>
                                    <p class="card-text">'.$resultado['cuerpo'].'</p>
                                    <br><br>                                 
                                    <h5 class="card-title">Por '.$resultado['autor'].'</h5>
                                    <br>
                                    <a href="javascript:history.back()" class="btn btn-primary">Volver</a>
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