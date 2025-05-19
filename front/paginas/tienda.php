<!DOCTYPE html>
<html>
<head>
    <title>PedalNest</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Explora la tienda de PedalNest con una amplia variedad de bicicletas y accesorios. Compra calidad, personaliza tu bici y disfruta del ciclismo.">
    <meta name="keywords" content="tienda de bicicletas, comprar bicicletas, accesorios de ciclismo, PedalNest, bicicletas en Málaga, ciclismo urbano, bicicletas personalizadas">
    <meta name="author" content="PedalNest">
    <meta property="og:title" content="Tienda PedalNest | Bicicletas y Accesorios de Calidad">
    <meta property="og:description" content="Compra bicicletas y accesorios en PedalNest. Desde modelos urbanos hasta de montaña. Todo lo que necesitas para rodar con estilo.">
    <meta property="og:url" content="https://tusitio.com/tienda.php">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_ES">
    <link rel="canonical" href="https://tusitio.com/tienda.php">

    <link rel="stylesheet" type="text/css" href="../front/bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="../front/imgs/favicon/logoPedal.png">
    <link rel="stylesheet" href="../front/css/var.css">
    <link rel="stylesheet" href="../front/css/tienda.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="../front/javascript/jquery-3.6.0.min.js"></script>
    <script src="../front/bootstrap/js/bootstrap.min.js"></script>
    <script defer src="../front/javascript/tienda.js"></script>
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
  <div class="container">
    <div class="row">
      <div class="col-lg-9" id="cajatienda">
        <h1>Nuestra Tienda</h1>
          <div class="accordion" id="accordionPanelsStayOpenExample">
          <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                  <i class="fa-solid fa-bicycle" style="margin-right: 10px;"></i> Bicicletas
                </button>
              </h2>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    <div class="container">
                      <div class="row">
                        <?php   
                          for($i=0; $i < count($Bicicletas);$i++){
                        ?>
                        <div class="col-lg-4">
                          <div class="card" style="width: 18rem;">
                            <a href="../back/controladorProducto.php?nombreProducto=<?php echo urlencode($Bicicletas[$i]->Nombre); ?>"><img src="../front/imgs/tienda/<?php echo($Bicicletas[$i]->Imagen);?>" class="card-img-top" alt="<?php echo($Bicicletas[$i]->Nombre);?>"></a>
                            <div class="card-body">
                              <a href="../back/controladorProducto.php?nombreProducto=<?php echo urlencode($Bicicletas[$i]->Nombre); ?>" style="color:black"><h5 class="card-title"><?php echo($Bicicletas[$i]->Nombre);?></h5></a>
                              <p class="d-none"><?php echo($Bicicletas[$i]->Precio);?></p>
                              <button id="<?php echo $Bicicletas[$i]->Nombre ?>" class="btn btn-primary">Comprar <?php  echo($Bicicletas[$i]->Precio);?>€</button>
                            </div>
                          </div>
                        </div>
                        <?php 
                        }
                        ?>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                  <i class="fa-solid fa-helmet-safety" style="margin-right: 10px;"></i> Accesorios
                </button>
              </h2>
              <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                <div class="accordion-body">
                    <div class="container">
                      <div class="row">
                      <?php   
                        for($i=0; $i < count($Accesorios);$i++){
                      ?>
                        <div class="col-lg-4">
                          <div class="card" style="width: 18rem;">
                            <a href="../back/controladorProducto.php?nombreProducto=<?php echo urlencode($Accesorios[$i]->Nombre); ?>"><img src="../front/imgs/tienda/<?php echo($Accesorios[$i]->Imagen);?>" class="card-img-top" alt="<?php echo($Accesorios[$i]->Nombre);?>"></a>
                            <div class="card-body">
                              <a href="../back/controladorProducto.php?nombreProducto=<?php echo urlencode($Accesorios[$i]->Nombre); ?>" style="color:black"><h5 class="card-title"><?php echo($Accesorios[$i]->Nombre);?></h5></a>
                              <p class="d-none"><?php echo($Accesorios[$i]->Precio);?></p>
                              <button id="<?php echo $Accesorios[$i]->Nombre ?>" class="btn btn-primary">
                                <i class="fa-solid fa-cart-plus" style="margin-right: 8px;"></i> Comprar <?php echo($Accesorios[$i]->Precio);?>€
                              </button>
                            </div>
                          </div>
                        </div>
                        <?php 
                        }
                        ?>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3" id="carrito">
          <h2>Tu cesta <i class="fa-solid fa-bag-shopping" style="color: #1b3039;"></i></h2>
          <hr>
          <div id="cards">Carrito vacío</div>
          <template id="card-template">
            <div class="card" style="width: 18rem;" id="item-carrito">
              <div class="card-body">
                <h5 class="card-title" id ="objetos"></h5>
                <hr>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-primary pse">
                    <i class="fa-solid bi-trash" style="color: #ffffff;"></i>
                  </button>
                  <button type="button" class="btn btn-primary pbt" id="precio">00,00€</button>
                </div>
                <div class="row">
                  <div class="col-2">
                    <button class="btn btn-danger btn-sm">-</button>
                  </div> 
                  <div class="col-7 text-center" id="cantidad">0</div> 
                  <div class="col-2">
                    <button class="btn btn-danger btn-sm">+</button>
                  </div>
                </div>
              </div>
            </div>
            <hr>
          </template>
          <div id="total">
            <h4>Carrito vacío - No hay productos</h4>
          </div>
          <template id="template-end">
            <h3 style="text-align: center; font-size: 25px;" id="T-precio">Total: 00.00€</h3>
            <button class="btn btn-primary" style="width: 100%;" id="id-btn-pago">
              <i class="fa-solid fa-cart-shopping" style="margin-right: 8px; color: #ffffff;"></i> Finalizar compra
            </button>
            <script src="../front/javascript/realizarCompra.js"></script>
            <script src="../front/javascript/comprobarCompra.js"></script>
          </template>
        </div>
      </div>
    </div>

    <div class="card d-none" style="width:35rem;height:min-cotent;position:absolute;top:15%;left:10%" id="tarjeta-creada">
      <div class="d-grid gap-2 d-md-flex justify-content-md-end" id="id-cerrar-card">
        <i class="fa-solid fa-xmark" style="color: #1b3039;"></i>
      </div>
      <div class="card-body">
        <form id="formTarjeta" method="POST" action="controladorCompra.php" >                 
          <div action="" role="form">
            <div class="form-group">
              <div class="container">
                <h5 class="card-title">Confirmar compra</h5>
                  <label for="id-form-pago" class="form-label"> Método de pago 
                    <i class="fa-solid fa-credit-card" style="color: #1b3039;"></i>
                  </label>
                  <select  class="form-select" name="form-pago" id="id-form-pago" aria-label="default">
                      <option value="0">Selecciona un método de pago</option>  
                      <option value="1">Tarjeta de crédito</option>  
                      <option value="2">Pagar en tienda</option>  
                  </select>
                  <div id="opcion-1" class="d-none">
                    <div class="row">
                      <div class="col-6">
                        <label for="id-card-name" class="form-label">Nombre de la tarjeta</label>
                        <input type="text" name="nombre-tarjeta" id="id-nombre-tarjeta" class="form-control" placeholder="Nombre de la tajeta">  
                      </div>
                      <div class="col-6">
                        <label for="id-card-number" class="form-label">Número de la tarjeta</label>
                        <input type="text" name="numero-tarjeta" id="id-numero-tarjeta" class="form-control" placeholder="0000000000000000">  
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <label for="id-fecha-tarjeta" class="form-label">Fecha de caducidad</label>
                        <input type="text" name="fecha-tarjeta" id="id-fecha-tarjeta" class="form-control" placeholder="MM/AA">
                        <span class="form-text"></span>    
                      </div>
                      <div class="col-6">
                        <label for="id-card-cvv" class="form-label">Número CVV</label>
                        <input type="text" name="cvv-tarjeta" id="id-card-cvv" class="form-control" placeholder="CVV">  
                      </div>
                    </div>
                  </div>
                  <div id="opcion-2" class="d-none">
                    <div class="row">
                      <div class="col-6">
                        <label for="id-nombre-comprador" class="form-label">Nombre</label>
                        <input type="text" name="nombre-comprador" id="id-nombre-comprador" class="form-control" placeholder="Nombre">   
                      </div>
                      <div class="col-6">
                        <label for="id-apellidos-comprador" class="form-label">Apellidos</label>
                        <input type="text" name="apellidos-comprador" id="id-apellidos-comprador" class="form-control" placeholder="Apellidos">  
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <label for="id-fecha-comprador" class="form-label">Fecha</label>
                        <input type="date" name="fecha-comprador" id="id-fecha-comprador" class="form-control">
                        <span class="form-text">Seleccione una fecha</span>    
                      </div>
                      <div class="col-6">
                        <label for="id-hora-comprador" class="form-label">Hora</label>
                        <select name="hora-comprador" id="id-hora-comprador" class="form-select">
                          <option value="" selected>Selecciona una hora</option>
                          <option value="8h">08:00</option>
                          <option value="9h">09:00</option>
                          <option value="10h">10:00</option>
                          <option value="11h">11:00</option>
                          <option value="12h">12:00</option>
                          <option value="13h">13:00</option>
                          <option value="14h">14:00</option>
                          <option value="16h">16:00</option>
                          <option value="17h">17:00</option>
                          <option value="18h">18:00</option>
                          <option value="19h">19:00</option>
                          <option value="20h">20:00</option>
                        </select>  
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-top:2%">
              <button id="botonTarjeta" type="submit" class="btn btn-dark">Continuar con la compra</button>
            </div>
          </div>
        </div>  
      </form>
    </div>
  </div>
  <?php include '../front/partes/footer.php';?>
</body>
</html>