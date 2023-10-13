
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand" href=""><?php print($_SESSION['nombre'] . " " . $_SESSION['apellido']) ?></a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="home.php" aria-current="page">Inicio<span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="noticias.php">Noticias</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="usuarios.php">Usuarios</a>
        </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Cerrar sesión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>