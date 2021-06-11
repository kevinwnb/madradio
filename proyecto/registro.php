<!doctype html>

<html lang="en">

<head>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/head.php" ?>
    <title>Registro</title>
</head>

<body>
    <?php $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/nav.php" ?>
    <div class="bg pt-5">
        <h3 class="mb-5 text-center">Registro</h3>
        <form id="login-form" class="card card-body mx-auto">
            <div class="mb-3">
                * <label class="form-label" for="exampleInputEmail1">Nombre</label>
                <input type="email" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="Nombre" required>
            </div>
            <div class="mb-3">
                * <label class="form-label" for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" required>
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
                compartidos con nadie.</small>
            <div class="text-center mt-3">
                <button id="register-btn" type="button" class="btn btn-primary">Registro</button>
            </div>
        </form>
    </div>

    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/footer.php" ?>

</body>

</html>