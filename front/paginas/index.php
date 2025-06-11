<!DOCTYPE html>
<html lang="es">
<head>
    <title>PedalNest</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="PedalNest: tu tienda de bicicletas de confianza. Ofrecemos bicicletas de alta calidad, accesorios y servicio personalizado. ¡Descubre el mundo sobre dos ruedas!">
    <meta name="keywords" content="bicicletas, ciclismo, tienda de bicicletas, PedalNest, accesorios para bicicletas, bicicletas en Málaga, customización de bicicletas, reserva de bicicletas">
    <meta name="author" content="PedalNest">
    <meta property="og:title" content="PedalNest | Tienda de bicicletas y accesorios">
    <meta property="og:description" content="Descubre PedalNest, la tienda ideal para los amantes del ciclismo. Compra, personaliza y reserva tu bicicleta desde casa.">
    <meta property="og:url" content="https://tusitio.com">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_ES">
    <link rel="canonical" href="https://tusitio.com">


    <link rel="stylesheet" type="text/css" href="../front/bootstrap/css/bootstrap.min.css">
    <script src="../front/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" type="image/png" href="../front/imgs/favicon/logoPedal.png">
    <link rel="stylesheet" href="../front/css/var.css">
    <link rel="stylesheet" href="../front/css/inicio.css">
    <link rel="stylesheet" href="../front/css/slider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script defer src="../front/javascript/slider.js"></script>
    <script defer src="../front/javascript/index.js"></script>
    <script src="../front/javascript/blur.js"></script>
</head>

<body>
  <?php
    if(validarSesion() && isset($_COOKIE['UsuarioLogeado'])){
      include '../front/partes/cabeceraLogeado.php';
    }else{
      include '../front/partes/cabecera.php';
    }
  ?>

  <section id="container-slider">
    <ul class="listslider">
      <li><a itlist="itList_0" href="#" class="item-select-slid"></a></li>
      <li><a itlist="itList_1" href="#"></a></li>
      <li><a itlist="itList_2" href="#"></a></li>
    </ul>
    <ul id="slider">
      <li style="background-image: url('../front/imgs/slider/bicicletaS.webp'); z-index:0; opacity: 1;"></li>
      <li style="background-image: url('../front/imgs/slider/bici1.webp'); "></li>
      <li style="background-image: url('../front/imgs/slider/familia.jpg'); "></li>
    </ul>
  </section>

  <div id="contendor3tarjetas" class="container">
    <div class="container">
      <div class="row">
        <div class="card">
          <div class="face front">
              <img src="../front/imgs/recursos/QuienesSomos.png" alt="Quiénes somos en PedalNest">
              <h3>¿Quienes Somos?</h3>
          </div>
          <div class="face back">
              <h3>¿Quienes Somos?</h3>
              <p>PedalNest es la tienda ideal para los amantes del ciclismo, ofreciendo bicicletas de alta calidad y accesorios innovadores.</p>
          </div>
        </div>

        <div class="card">
            <div class="face front">
                <img src="../front/imgs/recursos/Envios.png" alt="Envíos en PedalNest">
                <h3>Envíos</h3>
            </div>
            <div class="face back">
                <h3>Envíos</h3>
                <p>En PedalNest, garantizamos un servicio de envío rápido, seguro y confiable para que recibas tu bicicleta o accesorios sin complicaciones.</p>
            </div>
        </div>

        <div class="card">
            <div class="face front">
                <img src="../front/imgs/recursos/Cliente.png" alt="Atención al cliente en PedalNest">
                <h3>Atención Personalizada</h3>
            </div>
            <div class="face back">
                <h3>Atención Personalizada</h3>
                <p>En PedalNest, nos comprometemos a brindarte la mejor experiencia de compra con un servicio de atención al cliente excepcional.</p>
            </div>
        </div>

        <div id="donde-encontrarnos" class="container">
        <h1>¿Dónde encontrarnos?</h1>
          <div class="row">
            <div class="col-lg-8 d-flex justify-content-center">
                <iframe 
                    width="100%" 
                    height="350" 
                    frameborder="0" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d475.4149139212475!2d-4.424341761086368!3d36.71781589424546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd72f7969728a779%3A0xa98637056f6bf999!2sC.%20Panaderos%2C%2029005%20M%C3%A1laga!5e0!3m2!1ses!2ses!4v1699268691118!5m2!1ses!2ses">
                </iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row row-feedback">
      <div id="form" class="col-lg-6">
        <h1>Cuéntanos tu experiencia</h1>
        <form id="formularioResenas" action="controladorInicio.php" method="POST">
          <h4>Nombre</h4>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user" style="color: #ffffff;"></i></span>
              <input id="nombreInput" type="text" class="form-control" placeholder="Nombre y apellidos" aria-label="Username" aria-describedby="basic-addon1" name="nombre" required>
            </div>
          <h4>Correo electrónico</h4>
          <div class="input-group mb-3">
            <span class="input-group-text"><i class="fa-solid fa-inbox" style="color: #ffffff;"></i></span>
            <input id="correoInput" type="text" class="form-control" placeholder="ejemplo@correo.com" aria-label="Username" name="user" pattern="^[^@]+@[^@]+\.[a-zA-Z]{2,}$" required>
          </div>
          <h4>Tu mensaje</h4>
          <div class="input-group">
            <textarea id="textoInput" class="form-control" aria-label="With textarea" placeholder="Comparte tu experiencia con nosotros..." name="comentario" required></textarea>
          </div>
          <button id="botonform" name="enviar" type="submit">
            <i class="fa-solid fa-paper-plane" style="margin-right: 8px;"></i> Enviar comentario
          </button>
        </form>
      </div>
      <div id="exps" class="col-lg-6">
        <h1>Reseñas destacadas</h1>
          <?php 
            if (count($comentarios)) { 
              for($i = 0; $i < 3;$i++){ 
          ?>
            <div class="resena">
              <h5><i class="fa-solid fa-user-circle" style="margin-right: 10px; color: var(--colormain);"></i> <?php echo($comentarios[$i]->nombre); ?></h5>
              <p><?php echo($comentarios[$i]->texto); ?></p>
            </div>
          <?php
              }
            } else { ?>
            <div class="resena">
                <h5><i class="fa-solid fa-info-circle" style="margin-right: 10px; color: var(--colormain);"></i> Lo sentimos</h5>
                <p>Sin comentarios disponibles. ¡Sé el primero en compartir tu experiencia!</p>   
            </div>
          <?php 
            }
          ?>
      </div>
    </div>
  </div>

  <?php include '../front/partes/footer.php';?> 
</body>
<!--Autor: Fco. Manuel Martínez Vázquez-->
</html>