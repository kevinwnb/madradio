<!doctype html>

<html lang="en">

<head>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/head.php" ?>
    <title>Modificar Usuario</title>
</head>

<body>
    <h3 class="m-5 text-center">Modificar Usuario</h3>
    <div id="modify-user-form" class="card mx-auto">
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Nombre</label>
                    <input type="email" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="Nombre">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                    <small id="emailHelp" class="form-text text-muted">Respetamos tu privacidad, tu email no será
                        compartido con nadie.</small>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Role</label>
                    <select id="select-role" class="form-control">

                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputPassword1">Nueva Contraseña</label>
                    <input type="password" class="form-control" id="password" placeholder="Nueva Contraseña">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputPassword1">Repetir Contraseña</label>
                    <input type="password" class="form-control" id="repeat-password" placeholder="Repetir Contraseña">
                </div>
                <div class="text-center">
                    <button id="update-btn" type="button" class="btn btn-warning">Guardar</button>
                    <button id="cancel-btn" type="button" class="btn btn-secondary">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/footer.php" ?>

</body>

</html>