<?php
require $_SERVER['DOCUMENT_ROOT'] . "/base_url.php";

$publicaciones = json_decode(file_get_contents($base_url . "/api/publicaciones/all.php"));
$categorias = json_decode(file_get_contents($base_url . "/api/categorias/all.php"));
$generos = json_decode(file_get_contents($base_url . "/api/generos/all.php"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/head.php" ?>
    <title>Contacto</title>
</head>

<body>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/nav.php" ?>
    <script>
        document.querySelector(".navbar li a#contacto").classList.add("active");
    </script>
    <div class="bg">
        <form id="contacto" class="mx-auto my-5 p-4 card card-body">
            <h3 class="p-4 text-center">Contacto</h3>
            <div class="mb-3">
                * <label class="form-label" for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" id="nombre" aria-describedby="nombreHelp" placeholder="Nombre" required>
            </div>
            <div class="mb-3">
                * <label class="form-label" for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">Teléfono</label>
                <input type="text" class="form-control" id="telefono" aria-describedby="telefonoHelp" placeholder="Teléfono">
            </div>
            <div class="mb-3">
                * <label class="form-label" for="exampleInputPassword1">Mensaje</label>
                <textarea class="form-control" id="mensaje" placeholder="Mensaje" required></textarea>
            </div>
            <div class="text-center">
                <small id="emailHelp" class="form-text text-muted">Respetamos tu privacidad, tus datos no serán
                    compartidos con nadie</small><br>
                <button id="send-btn" type="button" class="btn btn-warning mt-3">Enviar</button>
            </div>
        </form>
    </div>

    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/footer.php" ?>

</body>

</html>