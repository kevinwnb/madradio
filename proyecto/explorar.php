<?php
require $_SERVER['DOCUMENT_ROOT'] . "/base_url.php";

$publicaciones = json_decode(file_get_contents($base_url . "/api/publicaciones/all.php"));
$categorias = json_decode(file_get_contents($base_url . "/api/categorias/all.php"));
$generos = json_decode(file_get_contents($base_url . "/api/generos/all.php"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/head.php" ?>
    <title>Explorar</title>
</head>

<body>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/nav.php" ?>
    <script>
        document.querySelector(".navbar li a#explorar").classList.add("active");
    </script>
    <div id="bg-explorar" class="bg explorar py-5">
        <div class="container">
            <div id="carouselExampleCaptions" class="carousel slide mb-5" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/imagenes/slide1.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/imagenes/slide2.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/imagenes/slide3.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <section id="destacados">
                <h2 class="text-center pb-3">Destacados</h2>
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
                            </div>
                            <?php $audio_id = uniqid(); ?>
                            <audio id="<?php echo $audio_id ?>">
                                <source src="<?php echo $p->url_audio ?>" type="audio/<?php echo substr($p->url_audio, -3) ?>">
                                Your browser does not support the audio element.
                            </audio>
                            <a id="btn-<?php echo $audio_id ?>" onclick="play('<?php echo $audio_id ?>')" href="javascript:void(0)" class="a-reproducir p-3 bg-warning text-center">
                                <i class="fas fa-play"></i><i class="fas fa-stop"></i> <span id="spn-reproducir">Reproducir</span><span id="spn-pausar">Pausar</span>
                            </a>
                        </div>
                    <?php
                    } ?>
                </div>
            </section>
            <?php foreach ($categorias->categorias as $c) { ?>
                <section id="categoria">
                    <h2 class="text-center pb-3"><?php echo $c->nombre ?></h2>
                    <div class="row g-4 pb-5">
                        <?php foreach ($publicaciones->publicaciones as $p) {
                            $usuario = json_decode(file_get_contents($base_url . "/api/usuarios/read.php?id=" . $p->id_usuario));
                            if ($p->id_categoria == $c->id) {
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
                                            <?php echo substr($p->descripcion, 0, 100) ?>
                                        </p>
                                    </div>
                                    <?php $audio_id = uniqid(); ?>
                                    <audio id="<?php echo $audio_id ?>">
                                        <source src="<?php echo $p->url_audio ?>" type="audio/<?php echo substr($p->url_audio, -3) ?>">
                                        Your browser does not support the audio element.
                                    </audio>
                                    <a id="btn-<?php echo $audio_id ?>" onclick="play('<?php echo $audio_id ?>')" href="javascript:void(0)" class="a-reproducir p-3 bg-warning text-center">
                                        <i class="fas fa-play"></i><i class="fas fa-stop"></i> <span id="spn-reproducir">Reproducir</span><span id="spn-pausar">Pausar</span>
                                    </a>

                                </div>
                        <?php }
                        } ?>
                    </div>
                </section>
            <?php } ?>
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