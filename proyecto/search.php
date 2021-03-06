<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . "/base_url.php";

$publicaciones = json_decode(file_get_contents($base_url . "/api/publicaciones/search.php?search=" . str_replace(" ", "%20", $_GET["search"])));
$categorias = json_decode(file_get_contents($base_url . "/api/categorias/all.php"));
$generos = json_decode(file_get_contents($base_url . "/api/generos/all.php"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/head.php" ?>
    <title>Buscar</title>
</head>

<body>
    <!--Modal-->
    <div class="modal fade" tabindex="-1" id="exampleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Comentarios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <div class="text-center w-100">
                        <h5 class="mb-3">Escribe un Comentario</h5>
                    </div>
                    <?php if (isset($_SESSION["id_usuario"])) { ?>
                        <form class="d-flex w-100">
                            <input id="id_publicacion" type="hidden">
                            <input id="comentario" class="form-control border border-dark" type="text" required>
                            <button id="btn_enviar" type="button" class="btn btn-warning ms-2">Enviar</button>
                        </form>
                    <?php } else {
                    ?>
                        <div class="text-center w-100">
                            <p>Debes iniciar sesión para escribir un comentario. </p><a href="/login.php">Iniciar Sesión</a>
                        </div>
                    <?php
                    } ?>

                </div>
            </div>
        </div>
    </div>

    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/nav.php" ?>

    <div id="bg-buscar" class="bg buscar py-5">
        <div class="container">
            <section id="destacados">
                <h2 class="text-center pb-3">Resultados</h2>
                <div class="row g-4 pb-5">
                    <?php
                    $shuffled_pubs = $publicaciones->publicaciones;
                    shuffle($shuffled_pubs);
                    foreach ($shuffled_pubs as $p) {
                        $usuario = json_decode(file_get_contents($base_url . "/api/usuarios/read.php?id=" . $p->id_usuario));
                    ?>
                        <div class="col-sm-6 col-md-4 col-xl-3">
                            <div class="card card-body pub">
                                <div class="row gx-2">
                                    <div class="col-4">
                                        <div id="pub-img-wrapper">
                                            <img src="<?php echo $p->url_imagen ?>">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <h6><?php foreach ($generos->generos as $g) {
                                                if ($g->id == $p->id_genero) {
                                                    echo $g->nombre;
                                                    break;
                                                }
                                            } ?></h6>
                                        <p>Subido por <span class="text-warning fw-bold"><?php echo $usuario->nombre ?></span></p>
                                    </div>
                                </div>
                                <h5 class="card-title pt-3"><?php echo $p->titulo ?></h5>
                                <p class="card-text">
                                    <?php echo substr($p->descripcion, 0, 100) . "..." ?>
                                </p>
                                <div class="row mx-0 bg-white">
                                    <div class="col-6 text-center px-0">
                                        <a href="javascript:void(0)" class="d-block btn btn-outline-danger border-2 m-1"><i class="far fa-heart fw-bold"></i></a>
                                    </div>
                                    <div class="col-6 text-center px-0">
                                        <a id="btn_comment_<?php echo $p->id; ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" href="javascript:void(0)" class="btn-comment d-block btn btn-dark border-2 m-1"><i class="far fa-comment fw-bold"></i></a>
                                    </div>
                                </div>
                                <?php $audio_id = uniqid(); ?>
                                <audio id="<?php echo $audio_id ?>">
                                    <source src="<?php echo $p->url_audio ?>" type="audio/<?php echo substr($p->url_audio, -3) ?>">
                                    Your browser does not support the audio element.
                                </audio>
                                <a id="btn-<?php echo $audio_id ?>" onclick="play('<?php echo $audio_id ?>')" href="javascript:void(0)" class="a-reproducir p-3 mt-1 bg-warning text-center">
                                    <i class="fas fa-play"></i><i class="fas fa-stop"></i> <span id="spn-reproducir">Reproducir</span><span id="spn-pausar">Pausar</span>
                                </a>
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>
            </section>
        </div>
    </div>

    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/footer.php" ?>

    <script>
        document.querySelectorAll("audio").forEach(element => {
            element.addEventListener("ended", function(e) {
                document.querySelector("#btn-" + e.target.id).classList.remove("reproduciendo");
            });
        });

        function stop(id) {
            document.querySelector("#btn-" + id.toString()).classList.remove('reproduciendo');
        }

        function play(id) {
            if (!document.querySelector('#btn-' + id.toString()).classList.contains('reproduciendo')) {
                document.querySelectorAll('.a-reproducir').forEach(e => {
                    e.classList.remove('reproduciendo')
                });
                document.querySelector('#btn-' + id.toString()).classList.add('reproduciendo');
                var sounds = document.getElementsByTagName('audio');
                for (i = 0; i < sounds.length; i++) {
                    sounds[i].pause();
                    sounds[i].currentTime = 0;
                };
                let audio = document.getElementById(id);
                audio.play();
            } else {
                let audio = document.getElementById(id);
                if (!audio.paused) {
                    audio.pause();
                    document.querySelector('#btn-' + id.toString()).classList.remove('reproduciendo');
                } else {
                    audio.play();
                    document.querySelector('#btn-' + id.toString()).classList.add('reproduciendo');
                }
            }
        }
    </script>
</body>

</html>