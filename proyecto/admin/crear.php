<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: https://mad-radio.herokuapp.com/login.php");
}
if ($_SESSION["role_id"] == 2) {
    header("Location: https://mad-radio.herokuapp.com/admin/dashboard.php");
}
?>
<!doctype html>

<html lang="en">

<head>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/head.php" ?>
    <title>Añadir Usuario</title>

</head>

<body>
    <h3 class="m-5 text-center">Añadir Usuario</h3>
    <div id="create-user-form" class="card mx-auto">
        <div class="card-body">
            <form>
                <div class="mb-3">
                    * <label class="form-label" for="exampleInputEmail1">Nombre</label>
                    <input type="email" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="Nombre" required>
                </div>
                <div class="mb-3">
                    * <label class="form-label" for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    * <label class="form-label" for="exampleInputEmail1">Role</label>
                    <select id="role_id" class="form-control">
                        <option value="1" selected>Administrador</option>
                        <option value="2">Cliente</option>
                    </select>
                </div>
                <div class="mb-3">
                    * <label class="form-label" for="exampleInputPassword1">Contraseña</label>
                    <input type="password" class="form-control" id="password" placeholder="Contraseña" required>
                </div>
                <div class="mb-3">
                    * <label class="form-label" for="exampleInputPassword1">Repetir Contraseña</label>
                    <input type="password" class="form-control" id="repeat_password" placeholder="Repetir Contraseña" required>
                </div>
                <small id="emailHelp" class="form-text text-muted">Respetamos tu privacidad, tus datos no serán
                    compartidos con nadie</small>
                <div class="text-center mt-3">
                    <button id="create-btn" type="button" class="btn btn-success">Crear</button>
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