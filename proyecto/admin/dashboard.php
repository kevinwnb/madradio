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
    <title>Admin Dashboard</title>
</head>

<body>
    <a href="/inicio.php" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Volver</a>

    <?php if ($_SESSION["role_id"] == 2) {
        echo "<div class='alert alert-danger'>Esta sección es para administradores</div>";
    } else { ?>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>De verdad quieres eliminar a este usuario?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button id="admin-confirm-delete-user" type="button" class="btn btn-danger">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="text-center m-5">Admin Dashboard</h3>

        <a id="crear-btn" class="btn btn-success m-2" href="crear.php">Añadir Usuario</a>
        <table id="tabla-usuarios" class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    <?php } ?>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/footer.php" ?>

</body>

</html>