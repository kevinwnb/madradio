<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "head.php"; ?>
</head>

<body>
    <?php require "nav.php"; ?>
    <script>
        document.querySelector(".navbar li a#crear-podcast").classList.add("active");
    </script>

    <div class="container my-5">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
            <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
                <label>CREAR</label>
                <h2 class="fw-bold">Cómo iniciar un podcast o radio en MadRadio</h2>
                <p class="lead">Entendemos lo desalentador que puede parecer el proceso de creación de un podcast, pero con la orientación adecuada, ¡puede ser bastante llevadero! Hemos desarrollado una guía para la ayuda de crear un podcast de principio a fin en MadRadio. </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                    <a href="/publicaciones/crear.php" class="btn btn-warning btn-lg px-4 me-md-2">¡Conviértete en un talento ya!</a>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
                <img class="rounded-lg-3" src="imagenes/publicacion.png" alt="" width="460" height="400">
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h2 class="text-center mt-5 mb-4">Pasos a seguir</h2>
            <div class="col-sm-12 col-md-6">
                <div class="border">
                    <i class="fas fa-pencil-alt" style="font-size:50px;"></i>
                    <h3>Elige un nombre</h3>
                    <p>Elige un nombre que los oyentes puedan encontrar fácilmente, que incluya algunas palabras clave de temas importantes y que refleje tu personalidad o la voz de tu empresa. </p>
                </div>
                <div class="mt-5 border">
                    <i class="fas fa-cog" style="font-size:50px;"></i>
                    <h3>Formato</h3>
                    <p>Aquí tendrás que decidir qué tipo de formato te ayudará a compartir mejor tu mensaje. ¿Te ayudará un podcast en solitario, una entrevista, un podcast de ficción o uno de estilo narrativo? </p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 ">
                <div class="border">
                    <i class="fab fa-readme" style="font-size:50px;"></i>
                    <h3>Descripcion y Categoría</h3>
                    <p>Elige una descripción llamativa para tu audio subido a la plataforma y por supuesto su correspondiente categoría junto a su género.</p>
                </div>

                <div class="mt-5 border">
                    <i class="far fa-image" style="font-size:50px;"></i>
                    <h3>Imagen destacada</h3>
                    <p>El diseño debe reflejar el tema de tu show e incluir más imágenes que palabras. Empieza a buscar ideas para la portada de tu podcast mirando shows en tus aplicaciones de escucha favoritas y fíjate en aquellas imágenes que llamen tu atención. </p>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-5">
    <div class="container-md">
        <div class="row align-items-center justify-content-center mt-5">
            <div class="col-sm-6 col-md-5">
                <img class="rounded-lg-3 img-fluid" src="imagenes/software.jpg" alt="">
            </div>
            <div class="col-sm-6 col-md-5">
                <h2>Encuentra el software de grabacion de audio adecuado para ti</h2>
                <h4>¿Cuál es el que mejor se adapta a tus necesidades?</h4>
                <p>Con tantas opciones disponibles, probablemente te estarás preguntando qué software de grabación de podcasts deberías usar.
                    La realidad es que hay un montón de excelentes opciones. Tu elección dependerá del tipo de software de podcast que estés buscando. </p>
            </div>
        </div>
        <div class="row justify-content-center mt-5 gx-5 ">
            <div class="col-sm-6 col-md-5">
                <div class="row border">
                    <i class="far fa-hand-point-right col-2 align-self-center" style="font-size:50px;"></i>
                    <p class="col-10">Audacity para escritorio es una rápida y sencilla herramienta para grabar, añadir efectos de sonido, y cortar y recortar el audio.</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-5">
                <div class="row border">
                    <i class="far fa-hand-point-up col-2 align-self-center" style="font-size:50px;"></i>
                    <p class="col-10">Hay muchas herramientas mas que son totalmente gratuitas para grabar tu nuevo podcast o cancion. Hecha un vistazo a Ardour, Anchor y Recording Studio</p>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-5">
    <div class="container-md mt-5">
        <div class="row">
            <div class="col-sm-6 col-md-5">
                <img class="rounded-lg-3 img-fluid" src="imagenes/subir.jpg" alt="">
            </div>

            <div class="col-sm-6 col-md-5 pt-5">
                <h2>Publica ya tu contenido !</h2>
                <p>Ahora que ya has unido todas las piezas del rompecabezas de tu podcast, es el momento de empezar. Independientemente de cuál sea el tema de tu podcast, siempre habrá un nicho de mercado esperando a escuchar lo que tengas que decir.
                    Así que no dejes que pase más tiempo... ¡Ha llegado el momento de sumergirte en MadRadio! </p>
            </div>
        </div>
    </div>
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . "/footer.php" ?>
</body>

</html>