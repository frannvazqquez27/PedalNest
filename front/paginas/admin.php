<!DOCTYPE html>
<html lang="es">
<head>
    <title>PedalNest</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../front/bootstrap/css/bootstrap.min.css">
    <script src="../front/bootstrap/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="../front/imgs/favicon/logoPedal.png">
    <link rel="stylesheet" href="../front/css/var.css">
    <link rel="stylesheet" href="../front/css/registro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script defer src="../front/javascript/slider.js"></script>
    <script src="../front/javascript/blur.js"></script>
</head>
<body>
    <?php 
        if (validarSesion() && isset($_COOKIE['UsuarioLogeado'])) {
            include '../front/partes/cabeceraLogeado.php';
        } else {
            include '../front/partes/cabecera.php';
        }
    ?>
    <div class="container" style="margin-bottom:100px;">
        <div class="row" id="cv">
            <div class="col-lg-12" id="cajalogin">
                <h4>Reponer Producto</h4>
                <form id="formularioReponer" method="POST" action="controladorAdmin.php">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5>Nombre Producto</h5>
                            <div class="input-group mb-3">
                                <input id="nombreproducto1" type="text" class="form-control" name="nombreproducto1"
                                    placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h5>Cantidad</h5>
                            <div class="input-group mb-3">
                                <input id="cantidad" type="number" class="form-control" name="cantidad" placeholder=""
                                    min="1" required>
                            </div>
                        </div>
                        <button id="btnAñadir" type="submit" class="btn btn-primary" name="addProduct">Añadir</button>
                    </div>
                </form>

                <br>
                <hr>
                <br>

                <h4>Eliminar Producto</h4>
                <form id="formularioEliminar" method="POST" action="controladorAdmin.php">
                    <div class="row">
                        <h5>Nombre del Producto a eliminar</h5>
                        <div class="input-group mb-3">
                            <input id="nombreproducto2" type="text" class="form-control" name="nombreproducto2"
                                placeholder="Nombre" required>
                        </div>
                        <div class="col-lg-6">
                            <h5>Cantidad</h5>
                            <div class="input-group mb-3">
                                <input id="cantidad" type="number" class="form-control" name="cantidad" placeholder="">
                            </div>
                        </div>
                        <button id="btnEliminar" type="submit" class="btn btn-primary" name="delProduct">Eliminar</button>
                    </div>
                </form>

                <br>
                <hr>
                <br>

                <form name="cerrar" method="POST" action="controladorPerfil.php">
                    <button type="submit" class="btn btn-primary" name="cerrarSesion">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </div>
    <?php include '../front/partes/footer.php'; ?>
</body>
<!--Autor: Fco. Manuel Martínez Vázquez-->
</html>