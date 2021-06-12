<?php
require $_SERVER['DOCUMENT_ROOT'] . "/base_url.php";
require $_SERVER['DOCUMENT_ROOT'] . "/db_conexion.php";

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
    <title>MadRadio</title>
</head>

<body>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/nav.php" ?>
    <script>
        document.querySelector(".navbar li a#inicio").classList.add("active");
    </script>

    <div class="container-fluid">
        <div class="row align-items-center mt-4 border">
            <div class="col-md-6">
                <div class="h-100 p-5 bg-light rounded-3">
                    <h3>MadRadio</h3>
                    <h2>El hogar de las infinitas posibilidades para subir tu audio mp3</h2>
                    <p>Es la solución integral para la creación, distribución de tu audio. Inicia tu apasionante proyecto o hacer
                        crecer una empresa de radio nunca ha sido tan fácil. </p>
                    <a class="btn btn-outline-dark" href="publicaciones/crear.php">Comienza a crear</a>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <img src="imagenes/radio.jpg" class="img-fluid" alt="imagen-promo">
            </div>
        </div>
    </div>

    <div class="container-md  pt-5">
        <div class="row mt-3">
            <div class="col-12 text-center">
                <h2>Alojar podcasts y radio es muy sencillo con MadRadio</h2>
                <p>Con MadRadio, crear un contenido impactante no supone ningún esfuerzo. Durante más de una década, nuestro
                    equipo y producto han proporcionado a los podcasters y a los editores todas las herramientas necesarias para
                    lograr el éxito. </p>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid  bg-light">
        <div class="row text-center pt-5">
            <h2>Servicios</h2>
        </div>
        <div class="row pt-5">
            <div class="col-sm text-center ">
                <div>
                    <span class="far fa-thumbs-up mb-3" style="font-size:50px;"></span>
                </div>
                <div>
                    <label>Calidad</label>
                    <p>Ofrecemos la mejor calidad en nuestra pagina web para la creación de audios con musica o radio</p>
                </div>
            </div>
            <div class="col-sm text-center">
                <div>
                    <span class="fas fa-shield-alt mb-3" style="font-size:50px;"></span>
                </div>
                <div>
                    <label>Seguridad</label>
                    <p>Nuestra pagina ofrece bastante seguridad al navegar y con las cuentas de los usuarios existentes</p>
                </div>
            </div>
            <div class="col-sm text-center">
                <div>
                    <span class="fab fa-creative-commons-nc-eu mb-3" style="font-size:50px;"></span>
                </div>
                <div>
                    <label>Gratuito</label>
                    <p>Nuestro servicio de subida de archivos MP3 es totalmente grauito </p>
                </div>
            </div>
            <div class="col-sm text-center">
                <div>
                    <span class="fas fa-laptop mb-3" style="font-size:50px;"></span>
                </div>
                <div>
                    <label>Soporte</label>
                    <p>Todos nuestros servicios tienen un gran soporte técnico para futuras mejoras y actualizaciones</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row testimonios">
            <div class="col-3 text-center mt-3">
                <h1>Testimonios</h1>
                <p class="mx-auto">Opiniones de los clientes de MadRadio</p>
            </div>
            <div class="col-sm  mt-3 text-center">
                <img src="imagenes/girl.jpg" class="rounded mx-auto d-block" width="70px" height="50px" ; alt="...">
                <span>Maria Martinéz</span>
                <p class="mt-2 mx-auto">Muchas gracias por hacer el alojamiento de audios una carrera viable para mí. Antes de
                    que MadRadio entrara en mi vida
                    no me escuchaba casi nadie. Ahora me ha cambiado la vida por completo gracias a vosotros.
                </p>
            </div>
            <div class="col-sm  mt-3 text-center">
                <img src="imagenes/boy.jpg" class="rounded mx-auto d-block" width="70px" height="50px" ; alt="...">
                <span>Alvaro Sánchez</span>
                <p class="mt-2 mx-auto">Me encanta esta nueva plataforma donde cualquiera pueda registrarse para subir su
                    contenido. Tanto podcasts, charlas o una mini radio
                    todo lo encontraras aqui.
                </p>
            </div>
            <div class="col-sm  mt-3 text-center">
                <img src="imagenes/chico2.jpg" class="rounded mx-auto d-block" width="70px" height="50px" ; alt="...">
                <span>Luis Zapato</span>
                <p class="mt-2 mx-auto">Gracias a MadRadio he podido enseñarles a mis amigos el gran talento que tengo para
                    cantar, he empezado a subir muchos audios para que lo escuchen.
                    Espero que tenga un buen futuro esta plataforma.
                </p>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-md bg-light  pt-5">
        <div class="row mt-3">
            <div class="col-12 text-center">
                <h2>Descubre nuestros podcasts y radio mas destacados</h2>
                <p>Los mejores audios se podran encontrar en dicho apartado</p>
                <section id="destacados">
                    <div class="row g-4 pb-5 bg-secondary mt-5">
                        <?php
                        $shuffled_pubs = $publicaciones->publicaciones;
                        shuffle($shuffled_pubs);
                        $shuffled_pubs = array_slice($shuffled_pubs, 0, 4);
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
                <button class="btn btn-outline-dark my-5" type="button">Descubre Más</button>
            </div>
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