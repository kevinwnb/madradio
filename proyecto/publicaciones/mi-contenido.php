<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: https://mad-radio.herokuapp.com/login.php");
}
?>
<!doctype html>

<html lang="en">

<head>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/head.php" ?>
    <title>Mi Contenido</title>
</head>

<body>
    <?php $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/nav.php" ?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>De verdad quieres eliminar esta publicación?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button id="confirm-delete-pub" type="button" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <h3 class="text-center m-5">Mi Contenido</h3>

    <a id="crear-btn" class="btn btn-success m-2" href="crear.php">Crear Publicación</a>
    <table id="tabla-publicaciones-usuario" class="table">
        <thead>
            <tr>
                <th scope="col">Imágen</th>
                <th scope="col">Título</th>
                <th scope="col">Fecha</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/footer.php" ?>

</body>

</html>