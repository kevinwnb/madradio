<div class="container-fluid">
    <div class="row bg-dark campos">
        <div class="col-5"></div>
        <div class="col-5"></div>
        <div class="col-2 botones">
            <span class="fas fa-microphone"></span>
            <a href="/publicaciones/crear.php" type="button" class="btn btn-warning" id="boton-subir">Subir</a>
            <a href="/login.php" type="button" class="btn btn-light">Acceder</a>
            <a href="/registro.php" type="button" class="btn btn-light">Registrar</a>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
        <a class="navbar-logo" href="#"><img src="imagenes/Mad radio sin circulo negro.png" id="Logo-MadRadio" width="40%" ALT="Logo-MadRadio"></a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center mb-3" id="menu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link  text-white" href="/inicio.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/explorar.php">Explorar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/publicaciones/crear.php">Crear Podcasts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/contacto.php">Contacto</a>
                </li>

                <div class="botones2  mx-auto">
                    <li class="mt-2">
                        <i class="fas fa-microphone"></i>
                        <a class="btn btn-warning" id="boton-subir" href="/publicaciones/crear.php">Subir</a>
                    </li>
                    <li class="mt-3">
                        <a class="btn btn-light" href="/login.php">Acceder</a>
                    </li>
                    <li class="mt-3 mb-3">
                        <a class="btn btn-light" href="/registro.php">Registrar</a>
                    </li>

                </div>
            </ul>
            <form id="buscador" class="form-inline my-2 my-lg-0 buscador">
                <input class="form-control mr-sm-2" type="Buscar" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </nav>
</div>