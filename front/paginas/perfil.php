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
    <link rel="stylesheet" href="../front/css/perfil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script defer src="../front/javascript/slider.js"></script>
    <script src="../front/javascript/jquery-3.6.0.min.js"></script>
    <script defer src="../front/javascript/subirImg.js"></script>
    <script src="../front/javascript/blur.js"></script>
</head>

<body>
    <?php 
        if (validarSesion() && isset($_COOKIE['UsuarioLogeado'])) {
            include '../front/partes/cabeceraLogeado.php';
        } else {
            header('Location: controladorLogin.php');
        }
    ?>
    <div class="container">
        <div class="row" id="cv">
            <div class="col-lg-12">
                <br><br>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-3">
                        <div class="input-group mb-3">
                            <?php 
                                $url = '../front/imgs/usuarios/' . $datos->ImagenUsuario;
                                if (@getimagesize($url) == false) {
                                    $url = "../front/imgs/usuarios/default.png";
                                }
                            ?>
                            <img src="<?= $url ?>" class="imgPerfil" alt="Imagen de perfil">
                        </div>
                        <div class="input-group mb-3">
                            <form id="f-camb-foto" name="camfoto" method="POST" action="controladorPerfil.php" enctype="multipart/form-data">
                                <input type="file" name="Subirimagen" id="subirimagen" accept="image/png, image/jpeg">
                                <label for="subirimagen" class="bg-primary">
                                    <i class="fa-solid fa-camera" style="margin-right: 8px;"></i> Elige una imagen...
                                </label>
                                <button type="submit" class="btn btn-primary" name="subir" id="btn-subirimg" disabled>
                                    <i class="fa-solid fa-cloud-arrow-up" style="margin-right: 8px;"></i> Subir imagen
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <h4><?= $datos->Nombre . " " . $datos->Apellidos; ?></h4>
                        <h6><i class="fa-solid fa-circle-user" style="margin-right: 8px; color: var(--colormain);"></i> BIENVENID@ A TU PERFIL</h6>
                        <form name="cerrar" method="POST" action="controladorPerfil.php">
                            <button type="submit" class="btn btn-primary" name="cerrarSesion" id="cerrar">
                                <i class="fa-solid fa-right-from-bracket" style="margin-right: 8px;"></i> Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>

                <br><br>

                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-4">
                        <div class="datos-section">
                            <h4>Datos de contacto</h4>
                            <h5><i class="fa-solid fa-envelope" style="margin-right: 10px; color: var(--colormain);"></i> <?= $datos->Correo; ?></h5>
                            <h5><i class="fa-solid fa-phone" style="margin-right: 10px; color: var(--colormain);"></i> <?= $datos->Telefijo; ?></h5>
                            <h5><i class="fa-solid fa-mobile-alt" style="margin-right: 10px; color: var(--colormain);"></i> <?= $datos->Telemovil; ?></h5>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="datos-section">
                            <h4>Datos de envío</h4>
                            <h5><i class="fa-solid fa-location-dot" style="margin-right: 10px; color: var(--colormain);"></i> <?= $datos->Direccion; ?></h5>
                            <h5><i class="fa-solid fa-city" style="margin-right: 10px; color: var(--colormain);"></i> <?= $datos->Poblacion; ?></h5>
                            <h5><i class="fa-solid fa-map-pin" style="margin-right: 10px; color: var(--colormain);"></i> <?= $datos->CodPos; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../front/partes/footer.php'; ?>
</body>
<!--Autor: Fco. Manuel Martínez Vázquez-->
</html>