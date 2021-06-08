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

  <div class="container-fluid">
    <div class="row align-items-center mt-4 border">
      <div class="col-md-6">
        <div class="h-100 p-5 bg-light rounded-3">
          <h3>MadRadio</h3>
          <h2>El hogar de las infinitas posibilidades para subir tu audio mp3</h2>
          <p>Es la solución integral para la creación, distribución de tu audio. Inicia tu apasionante proyecto o hacer
            crecer una empresa de radio nunca ha sido tan fácil. </p>
          <a class="btn btn-outline-warning" href="publicaciones/crear.php">Comienza a crear</a>
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
        <button class="btn btn-outline-warning" type="button">Descubre Más</button>
      </div>
    </div>
  </div>


  <div class="container-fluid mt-5">
    <div class="row text-center bg-dark p-5 text-white footer">
      <div class="col-md-4 mb-2 pt-5">
        Politíca de privacidad y condiciones legales
      </div>
      <div class="col-md-4 pt-4">
        <img src="imagenes/Mad radio sin circulo negro.png" class="img-fluid mx-auto" width="35%" ALT="Logo-MadRadio">
      </div>
      <div class="col-md-4 pt-5">
        <p>© 2021 MadRadio - Todos los derechos reservados</p>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>