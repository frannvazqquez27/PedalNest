<!DOCTYPE html>
<html lang="es">
    <head>
        <title>PedalNest</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../front/bootstrap/css/bootstrap.min.css">
		    <script src="../front/bootstrap/js/bootstrap.min.js"></script>
        <link rel="icon" type="image/png" href="../front/imgs/favicon/logoPedal.png">
        <link rel="stylesheet" href="../front/css/var.css">
        <link rel="stylesheet" href="../front/css/producto.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <script defer src="../front/javascript/slider.js"></script>
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
        <div class="row" id="cv">
          <div class="col-lg-12" id="">
            <br>    <br>
            <div class="row">  
                <div class="col-lg-2"></div> 
                <div class="col-lg-5">  
                    <div class=" input-group mb-3">
                        <img src="../front/imgs/tienda/<?php echo($productoSSS->Imagen)?>" class="imgPerfil" alt="...">                       
                    </div>
                </div>
                <div class="col-lg-5">  
                    <div class="row">  
                        <div class="col-lg-12">
                            <h4><?php echo($productoSSS->Nombre)?></h4>
                        </div>
                    </div>
                    <div class="row">        
                        <div class="col-lg-12">      
                            <h6><?php echo($productoSSS->Categoria)?></h6>
                        </div>    
                    </div>
                    <div class="row">
                        <h3><?php echo($productoSSS->Precio)?> €<h3> 
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                          <button class="btn btn-danger" data-target="html" id="btnToLeft">
                            <a href="../back/controladorCompra.php"><img src="../front/imgs/recursos/left-arrow.png"></a>
                          </button>
                        </div> 
                    </div> 
                  </div>  
            </div>
            <div class="row" id="desTitulo">  
                <div class="col-lg-2"></div> 
                <div class="col-lg-10">  
                    <h4>Descripci&oacute;n</h4>
                </div>   
            </div>
            <div class="row" id="desTexto">  
                <div class="col-lg-2"></div> 
                <div class="col-lg-7">  
                    <p><?php echo($productoSSS->Descripcion)?></p>
                </div>   
            </div>
          </div>
        </div>
      </div>
      <?php include '../front/partes/footer.php';?> 
    </body>
</html>