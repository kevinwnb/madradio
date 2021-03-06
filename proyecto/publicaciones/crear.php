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
    <title>Crear Publicación</title>
</head>

<body>
    <?php $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/nav.php" ?>

    <h3 class="m-5 text-center">Crear Publicación</h3>
    <div id="create-pub-form" class="card mx-auto">
        <div class="card-body">
            <form>
                <div class="mb-3">
                    * <label class="form-label" for="exampleInputEmail1">Título</label>
                    <input type="text" class="form-control" id="titulo" aria-describedby="Título" placeholder="Título" required>
                </div>
                <div class="mb-3">
                    * <label class="form-label" for="exampleInputEmail1">Descripción</label>
                    <textarea class="form-control" id="descripcion" placeholder="Descripción" required></textarea>
                </div>
                <div class="mb-3">
                    * <label class="form-label" for="exampleInputEmail1">Etiquetas</label>
                    <input type="text" class="form-control" id="etiquetas" aria-describedby="Etiquetas" placeholder="Música, POP, audio, ..." required>
                </div>
                <div class="mb-3">
                    * <label class="form-label" for="exampleInputEmail1">Categoría</label>
                    <select class="form-control" id="id_categoria">
                        <option value="0" selected>--Selecciona Categoría--</option>
                        <option value="1">Podcast</option>
                        <option value="2">Radio</option>
                    </select>
                </div>
                <div class="mb-3">
                    * <label class="form-label" for="exampleInputEmail1">Género</label>
                    <select id="id_genero" class="form-control">
                        <option value="0" selected>--Selecciona Género--</option>
                    </select>
                </div>
                <div class="mb-3">
                    * <label class="form-label" for="exampleInputPassword1">Imágen</label>
                    <input type="file" class="form-control" id="imagen" required>
                </div>
                <div class="mb-3">
                    * <label class="form-label" for="exampleInputPassword1">Audio</label>
                    <input type="file" class="form-control" id="audio" required>
                </div>
                <div class="text-center">
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