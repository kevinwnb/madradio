<!doctype html>

<html lang="en">

<head>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/head.php" ?>
    <title>Modificar Publicación</title>
</head>

<body>
    <?php $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/nav.php" ?>

    <h3 class="m-5 text-center">Modificar Publicación</h3>
    <div id="modify-pub-form" class="card mx-auto">
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Título</label>
                    <input type="text" class="form-control" id="titulo" aria-describedby="Título" placeholder="Título">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Descripción</label>
                    <textarea class="form-control" id="descripcion" placeholder="Descripción"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Etiquetas</label>
                    <input type="text" class="form-control" id="etiquetas" aria-describedby="Etiquetas" placeholder="Música, POP, audio, ...">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Categoría</label>
                    <select class="form-control" id="select-categoria">
                        <option selected>--Selecciona Categoría--</option>
                        <option value="1">Podcast</option>
                        <option value="2">Radio</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Género</label>
                    <select class="form-control" id="select-genero">
                        <option selected>--Selecciona Género--</option>
                    </select>
                </div>
                <div class="bg-secondary rounded p-2">
                    <small class="text-warning">Si seleccionas una imágen o audio se reemplazarán los archivos
                        actuales</small>
                    <div class="mb-3">
                        <label class="form-label" class="text-white" for="exampleInputPassword1">Reemplazar Imágen</label>
                        <input type="file" class="form-control" id="imagen">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" class="text-white" for="exampleInputPassword1">Reemplazar Audio</label>
                        <input type="file" class="form-control" id="audio">
                    </div>
                </div>
                <div class="text-center">
                    <button id="modify-btn" type="button" class="btn btn-warning">Modificar</button>
                    <button id="cancel-btn" type="button" class="btn btn-secondary">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/footer.php" ?>

    <script src="../script.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>