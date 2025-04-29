<!DOCTYPE html>

<html lang="es">
<head>
    <title>PedalNest</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../front/bootstrap/css/bootstrap.min.css">
    <script src="../front/bootstrap/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="../front/imgs/favicon/logoPedal.png">
    <link rel="stylesheet" href="../front/css/var.css">
    <link rel="stylesheet" href="../front/css/registro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script defer src="../front/javascript/slider.js"></script>
    <script defer src="../front/javascript/registro.js"></script>
    <script src="../front/javascript/blur.js"></script>
</head>

<body>
  <?php 
    include '../front/partes/cabecera.php';
  ?>
  <div class="container">
    <div class="row" id="cv">
      <div class="col-lg-12" id="cajalogin">
        <h2>Registro</h2>
        <p>¿Ya estás registrado? <a href="ControladorLogin.php" class="enlace">Iniciar Sesión</a></p>
        <hr>
        <form id="formularioRegistro"method="POST" action="ControladorRegister.php">
        <div class="row">  
            <div class="col-lg-6">  
                <h5>Nombre</h5>
                <div class=" input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user" style="color: #ffffff;"></i></span>
                    <input id="nombre" type="text" class="form-control" placeholder="Nombre" aria-label="Username" aria-describedby="basic-addon1" name="nombre" required>
                </div>
            </div>
            <div class="col-lg-6">  
                <h5>Apellidos</h5>
                <div class=" input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user" style="color: #ffffff;"></i></span>
                    <input id="apellidos" type="text" class="form-control" placeholder="Apellidos" aria-label="Username" aria-describedby="basic-addon1" name ="apellidos" required>
                </div>
            </div>   
            </div>     
        <div class="row">  
          <div class="col-lg-6">  
            <h5>Correo eléctronico</h5>
            <div class=" input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-inbox" style="color: #ffffff;"></i></span>
                <input id="correo" type="text" class="form-control" placeholder="Correo electrónico" aria-label="Username" aria-describedby="basic-addon1" name="correo"  pattern="^[^@]+@[^@]+\.[a-zA-Z]{2,}$" required>
            </div>
          </div>
          <div class="col-lg-6">  
            <h5>Confirma tu correo</h5>
            <div class=" input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-inbox" style="color: #ffffff;"></i></span>
                <input id="correo2"type="text" class="form-control" placeholder="Correo electrónico" aria-label="Username" aria-describedby="basic-addon1" name="confirmar_correo"  pattern="^[^@]+@[^@]+\.[a-zA-Z]{2,}$" required>
            </div>
          </div>   
        </div> 
        <div class="row">  
          <div class="col-lg-6">
            <h5>Contraseña</h5>
            <div class=" input-group mb-3">
                <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-key" style="color: #ffffff;"></i></span>
                <input id="pass" type="password" class="form-control" placeholder="********" aria-label="Username" aria-describedby="basic-addon1" name="passd" required>
            </div>
          </div>  
          <div class="col-lg-6">
            <h5>Confirmación</h5>
            <div class=" input-group mb-3">
                <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-key" style="color: #ffffff;"></i></span>
                <input id="pass2" type="password" class="form-control" placeholder="********" aria-label="Username" aria-describedby="basic-addon1" name="confirmar_passd" required> 
            </div>
          </div> 
        </div>
        <div class="row">  
          <div class="col-lg-6">  
            <h5>Código postal</h5>
            <div class=" input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelopes-bulk" style="color: #ffffff;"></i></span>
                <input id="cp" type="text" class="form-control" placeholder="29007" aria-label="Username" aria-describedby="basic-addon1" name="codigo_postal" pattern="^\d{5}$" required>
            </div>
          </div>
          <div class="col-lg-6">  
            <h5>Provincia</h5>
            <div class=" input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mountain-city" style="color: #ffffff;"></i></span>
                <input id="poblacion" type="text" class="form-control" placeholder="Málaga" aria-label="Username" aria-describedby="basic-addon1" name="poblacion" required>
            </div>
          </div>   
        </div> 
        <h5>Dirección</h5>
            <div class=" input-group mb-3">
                <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-location-dot" style="color: #ffffff;"></i></span>
                <input id="direccion" type="text" class="form-control" placeholder="C/ Cómpeta, 31, Cruz de Humilladero" aria-label="Username" aria-describedby="basic-addon1" name="direccion" required>                    
            </div>
        <div class="row">  
          <div class="col-lg-6">
            <h5>Teléfono</h5>
            <div class=" input-group mb-3">
                <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-phone-volume" style="color: #ffffff;"></i></span>
                <input id="tlfFijo" type="text" class="form-control" placeholder="000000000" aria-label="Username" aria-describedby="basic-addon1" name="telefonoFijo" pattern="^\d{9}$" required>     
            </div>
          </div>  
          <div class="col-lg-6">
            <h5>Móvil</h5>
            <div class=" input-group mb-3">
                <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-mobile" style="color: #ffffff;"></i></span>
                <input id="tlfMovil" type="text" class="form-control" placeholder="000000000" aria-label="Username" aria-describedby="basic-addon1" name="telefonomovil" pattern="^\d{9}$" required>
            </div>
          </div>
        </div>       
          <hr>
              <label class="ticks"><input type="checkbox" id="cbox1" value="first_checkbox" name="condiciones" required> Acepto <a href="#" class="enlace">las normas y condiciones de uso.</a></label><br>
              <label class="ticks"><input type="checkbox" id="cbox2" value="second_checkbox" name="notificaciones"> Quiero recibir correos y publicidad sobre las novedades de la tienda.</label>                   
            <br>
          <button id = "botonenviar" type="submit" class="btn btn-danger" name="registrar">Registrarme</button>
        </form>
      </div>
    </div>
  </div>
  <?php include '../front/partes/footer.php';?> 
</body>
</html>