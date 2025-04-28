<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../front/css/navbar.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="../front/imgs/favicon/logoPedal.png" alt="Logo de la marca">
        </div>
        <nav>
           <ul class="nav-links">
                <li><a href="../back/controladorInicio.php">Inicio</a></li>
                <li><a href="../back/controladorCompra.php">Tienda</a></li>
                <li><a href="../back/controladorReservas.php">Reservas</a></li>
                <li class="limenu">
                  <?php 
                      $datos = unserialize($_COOKIE['UsuarioLogeado']);
                      if($datos->Correo == "superusuario@gmail.com"){
                        $link = "../back/controladorAdmin.php";
                      } else {
                        $link = "../back/controladorPerfil.php";
                      }
                  ?>
                  <a class="menuitem" href=<?= $link ?>>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle icomenu" viewBox="0 0 16 16">
                      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                    <?= $datos->Nombre ?>
                  </a>
                </li>
           </ul>            
        </nav>
        <a onclick="openNav()" class="menu" href="#"><button>Menu</button></a>
        <div id="mobile-menu" class="overlay">
            <a onclick="closeNav()" href="" class="close">&times;</a>
            <div class="overlay-content">
                <a href="../back/controladorInicio.php">Inicio</a>
                <a href="../back/controladorCompra.php">Tienda</a>
                <a href="../back/controladorReservas.php">Reservas</a>
                <a href="<?= $link ?>"><?= $datos->Nombre ?></a>
           </div>
       </div>
    </header>
    <script type="text/javascript" src="../front/javascript/nav.js"></script>
</body>
</html>