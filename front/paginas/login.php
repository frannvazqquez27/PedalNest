<!DOCTYPE html>
<html lang="es">
<head>
    <title>PedalNest</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-control" content="no-cache">
    <link rel="stylesheet" type="text/css" href="../front/bootstrap/css/bootstrap.min.css">
    <script src="../front/bootstrap/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="../front/imgs/favicon/logoPedal.png">
    <link rel="stylesheet" href="../front/css/var.css">
    <link rel="stylesheet" href="../front/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script defer src="../front/javascript/slider.js"></script>
    <script defer src="../front/javascript/login.js"></script>
    <script src="../front/javascript/blur.js"></script>
</head>

<body>
    <?php include '../front/partes/cabecera.php'; ?>
    <div class="container">
        <div class="row" id="cv">
            <div class="col-lg-12" id="cajalogin">
                <h2>Iniciar sesión</h2>
                <p>¿No eres miembro todavía? <a href="controladorRegister.php" class="enlace">Regístrate</a></p>
                <hr>
                <form id="formularioLogin" method="POST" action="controladorLogin.php">
                    <h5>Correo electrónico</h5>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                        <i class="fa-solid fa-inbox" style="color: #ffffff;"></i>
                        </span>
                        <input id="correoInput" type="text" class="form-control" placeholder="ejemplo@gmail.com"
                            name="usuario" pattern="^[^@]+@[^@]+\.[a-zA-Z]{2,}$" required>
                    </div>
                    <h5>Contraseña</h5>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">
                        <i class="fa-solid fa-key" style="color: #ffffff;"></i>
                        </span>
                        <input id="passInput" type="password" class="form-control" name="pass" placeholder="********" required>
                    </div>
                    <a href="#" class="enlace">¿No recuerdas la contraseña?</a>
                    <hr>
                    <button type="submit" class="btn btn-primary" name="enviar" id="botonenviar">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </div>
    <?php include '../front/partes/footer.php'; ?>
</body>
<!--Autor: Fco. Manuel Martínez Vázquez-->
</html>