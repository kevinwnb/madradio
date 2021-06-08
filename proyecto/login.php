<!doctype html>

<html lang="en">

<head>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/head.php" ?>
    <title>Login</title>
</head>

<body>
    <?php $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/nav.php" ?>

    <h3 class="m-5 text-center">Iniciar Sesión</h3>
    <div id="login-form" class="card mx-auto">
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                    <small id="emailHelp" class="form-text text-muted">Respetamos tu privacidad, tu email no será
                        compartido con nadie.</small>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="text-center">
                    <button id="login-btn" type="button" class="btn btn-primary">Iniciar Sesión</button>
                </div>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>