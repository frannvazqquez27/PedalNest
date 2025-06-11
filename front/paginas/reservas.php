<!DOCTYPE html>
<html lang="es">
<head>
    <title>PedalNest</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Reserva tu bicicleta en PedalNest de forma rápida y sencilla. Elige día, hora y número de bicicletas para disfrutar de tu ruta perfecta.">
    <meta name="keywords" content="reserva bicicletas, alquiler bicicletas, PedalNest, bicicletas en Málaga, rutas en bici, ciclismo urbano, reservar online bicicleta">
    <meta name="author" content="PedalNest">
    <meta property="og:title" content="Reserva tu Bicicleta | PedalNest">
    <meta property="og:description" content="Gestiona fácilmente tu reserva de bicicleta con PedalNest. Elige fecha, hora y número de bicicletas y empieza a rodar.">
    <meta property="og:url" content="https://tusitio.com/reservas.php">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_ES">
    <link rel="canonical" href="https://tusitio.com/reservas.php">

    <link rel="stylesheet" type="text/css" href="../front/bootstrap/css/bootstrap.min.css">
    <script src="../front/bootstrap/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="../front/imgs/favicon/logoPedal.png">
    <link rel="stylesheet" href="../front/css/inicio.css">
    <link rel="stylesheet" href="../front/css/var.css">
    <link rel="stylesheet" href="../front/css/reservas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script defer src="../front/javascript/slider.js"></script>
    <script defer src="../front/javascript/reservas.js"></script>
    <script defer src="https://momentjs.com/downloads/moment-with-locales.js"></script>
    <script defer src="../front/javascript/calendario.js"></script>
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

  <h1 id="tilreservas">Reserva de bicicletas</h1>
    <div class = "container" id="contenedorReservas">
      <form id="formularioReservas" method="GET" action="controladorReservas.php">  
        <hr />
        <div class="row">
          <div class="col-lg-6">
            <div class="calendar">
              <div class="calendar__month">
                <div class="cal-month__previous"><</div>
                <div class="cal-month__current"></div>
                <div class="cal-month__next">></div>
              </div>
              <div class="calendar__head">
                <div class="cal-head__day"></div>
                <div class="cal-head__day"></div>
                <div class="cal-head__day"></div>
                <div class="cal-head__day"></div>
                <div class="cal-head__day"></div>
                <div class="cal-head__day"></div>
                <div class="cal-head__day"></div>
              </div>
              <div class="calendar__body">
                <div class="cal-body__week">
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                </div>
                <div class="cal-body__week">
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                </div>
                <div class="cal-body__week">
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                </div>
                <div class="cal-body__week">
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                </div>
                <div class="cal-body__week">
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                </div>
                <div class="cal-body__week">
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                  <div class="cal-body__day"></div>
                </div>
              </div>
            </div>
          </div>
          <div id = "segundaColumna"class="col-lg-6">
            <div class="row">
              <div  class="col-lg-6">
              <h3>Hora de inicio</h3>
              </div>
              <div  class="col-lg-6">
              <select name="entrada" id="entrada">
                <option value="08:00">08:00 h.</option>
                <option value="08:30">08:30 h.</option>
                <option value="09:00">09:00 h.</option>
                <option value="09:30">09:30 h.</option>
                <option value="10:00">10:00 h.</option>
                <option value="10:30">10:30 h.</option>
                <option value="11:00">11:00 h.</option>
                <option value="11:30">11:30 h.</option>
                <option value="12:00">12:00 h.</option>
                <option value="12:30">12:30 h.</option>
                <option value="13:00">13:00 h.</option>
                <option value="13:30">13:30 h.</option>
                <option value="14:00">14:00 h.</option>
                <option value="14:30">14:30 h.</option>
                <option value="15:00">15:00 h.</option>
                <option value="15:30">15:30 h.</option>
                <option value="16:00">16:00 h.</option>
                <option value="16:00">16:30 h.</option>
              </select>
              </div>
            </div>
            <div class="row">
              <div  class="col-lg-6">
              <h3>Hora de finalización</h3>
              </div>
              <div  class="col-lg-6">
              <select name="salida" id="salida">
                <option value="09:00">09:00 h.</option>
                <option value="09:30">09:30 h.</option>
                <option value="10:00">10:00 h.</option>
                <option value="10:30">10:30 h.</option>
                <option value="11:00">11:00 h.</option>
                <option value="11:30">11:30 h.</option>
                <option value="12:00">12:00 h.</option>
                <option value="12:30">12:30 h.</option>
                <option value="13:00">13:00 h.</option>
                <option value="13:30">13:30 h.</option>
                <option value="14:00">14:00 h.</option>
                <option value="14:30">14:30 h.</option>
                <option value="15:00">15:00 h.</option>
                <option value="15:30">15:30 h.</option>
                <option value="16:00">16:00 h.</option>
                <option value="16:00">16:30 h.</option>
                <option value="17:00">17:00 h.</option>
                <option value="17:30">17:30 h.</option>
              </select>
              </div>
            </div>
            <div class="row">
              <div  class="col-lg-6">
                <h3>Nombre y apellidos</h3>
              </div>
              <div  class="col-lg-6">
                <div class=" input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user" style="color: #ffffff;"></i></span>
                  <input type="text" id="nombreInput" class="form-control" placeholder="Nombre y apellidos" aria-label="Username" aria-describedby="basic-addon1" name="user" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div  class="col-lg-6">
                <h3>Número de bicicletas</h3>
              </div>
              <div  class="col-lg-6">
                <div class=" input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-bicycle" style="color: #ffffff;"></i>
                  </span>
                  <input type="number" id="personasInput" class="form-control" placeholder="Nº de bicicletas" aria-label="Username" aria-describedby="basic-addon1" required min="1" max="8" name="personas">
                </div>
              </div>
            </div>
            <div class="row">
              <button id="botonform" name="enviar" type="submit"><span>Enviar</span></button>
            </div>
          </div>
        </div>
      </form> 
    </div>
    <?php include '../front/partes/footer.php';?> 
</body>
<!--Autor: Fco. Manuel Martínez Vázquez-->
</html>