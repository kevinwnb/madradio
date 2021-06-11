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

    <div class="bg p-5">
        <h3 class="mb-5 text-center">Iniciar Sesión</h3>
        <div id="login-form" class="card mx-auto">
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label" for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
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
    </div>

    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/footer.php" ?>

</body>

</html>