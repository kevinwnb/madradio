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

    <h3 class="m-5 text-center">Registro</h3>
    <form id="login-form" class="card card-body mx-auto bg-dark">
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
            <label class="form-label" for="exampleInputPassword1">Contraseña</label>
            <input type="password" class="form-control" id="password" placeholder="Contraseña">
        </div>
        <div class="mb-3">
            <label class="form-label" for="exampleInputPassword1">Repetir Contraseña</label>
            <input type="password" class="form-control" id="repeat-password" placeholder="Repetir Contraseña">
        </div>
        <div class="text-center">
            <button id="register-btn" type="button" class="btn btn-primary">Registro</button>
        </div>
    </form>

    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/footer.php" ?>

    <script src="script.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>