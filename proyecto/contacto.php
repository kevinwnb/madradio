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
    <title>Explorar</title>
</head>

<body>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/nav.php" ?>
    <div class="bg p-1">
        <form id="contacto" class="bg-dark mx-auto my-5 p-4 card card-body">
            <h3 class="p-4 text-center text-white">Contacto</h3>
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" id="nombre" aria-describedby="nombreHelp" placeholder="Nombre">
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                <small id="emailHelp" class="form-text text-muted">Respetamos tu privacidad, tu email no será
                    compartido con nadie.</small>
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">Teléfono</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                <small id="emailHelp" class="form-text text-muted">Respetamos tu privacidad, tu teléfono no será
                    compartido con nadie.</small>
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleInputPassword1">Mensaje</label>
                <textarea class="form-control" id="mensaje" placeholder="Mensaje"></textarea>
            </div>
            <div class="text-center">
                <button id="send-btn" type="button" class="btn btn-warning">Enviar</button>
            </div>
        </form>
    </div>

    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/footer.php" ?>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>