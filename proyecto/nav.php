<?php session_start();
require "base_url.php";
?>

<div class="d-flex justify-content-end bg-dark p-3">
    <div class="botones w-100 w-sm-auto text-end">
        <p class="d-block d-sm-inline-block text-secondary btn bg-dark m-0">
            <?php
            if (isset($_SESSION["id_usuario"])) {
                $user = json_decode(file_get_contents($base_url . "/api/usuarios/read.php?id=" . $_SESSION["id_usuario"]));
                echo "Bienvenido " . strtok($user->nombre, ' ');
            }
            ?>
        </p>
        <a href="/publicaciones/crear.php" class="d-block d-sm-inline-block btn btn-warning" id="boton-subir"><i class="fas fa-microphone"></i> Subir</a>
        <?php
        if (!isset($_SESSION["id_usuario"])) {
        ?>
            <a href="/login.php" type="button" class="d-block d-sm-inline-block btn btn-success"><i class="fas fa-sign-in-alt"></i> Acceder</a>
            <a href="/registro.php" type="button" class="d-block d-sm-inline-block btn btn-light"><i class="fas fa-user-plus"></i> Crear Cuenta</a>
        <?php
        }
        ?>
        <?php
        if (isset($_SESSION["id_usuario"])) {

        ?>
            <a href="javascript:void(0)" id="btn-salir" class="d-block d-sm-inline-block btn btn-outline-danger">Salir <i class="fas fa-sign-out-alt"></i></a>
        <?php
        }
        ?>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/inicio.php"><img id="logo" src="imagenes/Mad radio sin circulo negro.png" ALT="Logo-MadRadio"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/inicio.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/explorar.php">Explorar</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Géneros
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <p class="category-title">Radio</p>
                        </li>
                        <li><a class="dropdown-item" href="#">POP</a></li>
                        <li><a class="dropdown-item" href="#">Rock</a></li>
                        <li><a class="dropdown-item" href="#">Popular</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <p class="category-title">Podcasts</p>
                        </li>
                        <li><a class="dropdown-item" href="#">Investigación</a></li>
                        <li><a class="dropdown-item" href="#">Informativo</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contacto.php">Contacto</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<nav class="d-none navbar navbar-expand-lg navbar-light bg-dark text-white">
    <a class="navbar-logo ms-3" href="#"><img src="imagenes/Mad radio sin circulo negro.png" id="Logo-MadRadio" width="40%" ALT="Logo-MadRadio"></a>
    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="menu">
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
        <div class="input-group w-auto mx-3">
            <input type="text" class="form-control" placeholder="Buscar" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
        </div>
    </div>
</nav>