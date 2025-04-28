<!DOCTYPE html>
<html lang="es">
<head>
    <title>PedalNest</title>
    <meta charset="UTF-8">
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
    <a href="javascript: fntExecuteSlide('prev');" class="arrowPrev"><i class="fas fa-chevron-circle-left"></i></a>
    <a href="javascript: fntExecuteSlide('next');" class="arrowNext"><i class="fas fa-chevron-circle-right"></i></a>
    <ul class="listslider">
      <li><a itlist="itList_0" href="#" class="item-select-slid"></a></li>
      <li><a itlist="itList_1" href="#"></a></li>
      <li><a itlist="itList_2" href="#"></a></li>
    </ul>
    <ul id="slider">
      <li style="background-image: url('../front/imgs/slider/bicicletaS.webp'); z-index:0; opacity: 1;">
        <div class="content_slider"></div>
      </li>
      <li style="background-image: url('../front/imgs/slider/bici1.webp'); ">
        <div class="content_slider"></div>
      </li>
      <li style="background-image: url('../front/imgs/slider/familia.jpg'); ">
        <div class="content_slider"></div>
      </li>
    </ul>
  </section>

  <div id="contendor3tarjetas" class="container">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
            <div class="tarjeta">
              <i class="fa-solid fa-people-group" style="color: #1b3039;"></i>
              <h2 style="color:black">¿Quienes Somos?</h2>
              <p>PedalNest es la tienda ideal para los amantes del ciclismo, ofreciendo bicicletas de alta calidad y accesorios innovadores.</p>
            </div>
        </div>

        <div class="col-lg-4">
          <div class="tarjeta">
            <i class="fa-solid fa-truck-fast" style="color: #1b3039;"></i>
            <h2 style="color:black">Envíos</h2>
            <p>En PedalNest, garantizamos un servicio de envío rápido, seguro y confiable para que recibas tu bicicleta o accesorios sin complicaciones.</p>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="tarjeta">
            <i class="fa-solid fa-headset" style="color: #1b3039;"></i>
            <h2 style="color:black">Atención al Cliente Personalizada</h2>
            <p>En PedalNest, nos comprometemos a brindarte la mejor experiencia de compra con un servicio de atención al cliente excepcional.</p>
          </div>
        </div>

        <div id="donde-encontrarnos" class="container">
        <h1 style="text-align: center; color: black;">¿Dónde encontrarnos?</h1>
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
    <div class="row">
      <div id="form" class="col-lg-8">
        <h1 style="text-align: center; color: black">Cuéntanos</h1>
      <form id="formularioResenas" action="controladorInicio.php" method="POST">
        <h4>Nombre</h4>
        <div class=" input-group mb-3">
          <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-person-fill" viewBox="0 0 16 16">
            <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-1 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm-3 4c2.623 0 4.146.826 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-1.245C3.854 11.825 5.377 11 8 11z"/>
          </svg></span>
          <input id = "nombreInput" type="text" class="form-control" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1" name="nombre" required>
        </div>
        <h4>Correo eléctronico</h4>
        <div class="input-group mb-3">
          <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
          </svg></span>
          <input id = "correoInput" type="text" class="form-control" placeholder="Correo" aria-label="Username" name="user"  pattern="^[^@]+@[^@]+\.[a-zA-Z]{2,}$" required>
        </div>
        <div class="input-group">
          <textarea id = "textoInput" class="form-control" aria-label="With textarea" placeholder="Añade un comentario" name="comentario"></textarea>
        </div>
        <button button id="botonform" name="enviar" type="submit">Enviar</button>
      </form>
      </div>
      <div id="exps" class="col-lg-4">
        <h1>Reseñas destacadas</h1>
          <?php 
          if (count($comentarios)) { 
          for($i = 0; $i < 3;$i++){ 
          ?>
        <div class="resena">
          <h5> <?php echo($comentarios[$i]->nombre); ?></h5>
          <p> <?php echo($comentarios[$i]->texto); ?></p>
        </div>
        <?php 
          }

        } else { ?>
          <div class="resena">
              <h5>Lo sentimos.</h5>
              <p>Sin comentarios disponibles</p>   
          </div>
        <?php 
        }
        ?>
      </div>
    </div>
  </div>

  <?php include '../front/partes/footer.php';?> 
</body>
</html>