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
      <div class="col-md-2">
        
      </div>
      <div class="col-md-8">
        <div
          class="h-100 p-5 text-white bg-secondary border rounded-3">
          <h2>Cómo utilizar esta aplicación</h2>
          <br>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium laudantium tenetur non adipisci quis fuga quae, excepturi hic neque vel harum nisi debitis nobis magni soluta id perferendis! Quis, beatae.
          </p>
          <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, deleniti, adipisci aspernatur dignissimos qui neque error eligendi nulla nisi aut quibusdam similique eos consequuntur perspiciatis sit, provident nostrum maxime corrupti?
          </p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Id expedita ea provident facilis porro animi nemo culpa? Dolore corporis maxime quasi harum nihil doloribus doloremque odit! In eos commodi adipisci?
          </p>
          <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae consequuntur molestiae accusamus illum non perferendis quis quasi dolor doloribus! Ea recusandae pariatur et, autem alias in laborum consequatur quisquam magni.
          </p>
          <a class="btn btn-outline-light" href="home.php" role="button">Volver</a>
        </div>
      </div>
    </div>
    <br>     
  </div>
  <script src="../lib/bootstrap-5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>