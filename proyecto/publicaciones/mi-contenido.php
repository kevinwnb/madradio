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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    De verdad quieres eliminar esta publicación?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
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