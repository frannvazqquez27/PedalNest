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
                <li><a href="../back/controladorLogin.php">Inicio de Sesión</a></li>
           </ul>            
        </nav>
        <a onclick="openNav()" class="menu" href="#"><button>Menú</button></a>
        <div id="mobile-menu" class="overlay">
            <a onclick="closeNav()" href="" class="close">&times;</a>
            <div class="overlay-content">
                <a href="../back/controladorInicio.php">Inicio</a>
                <a href="../back/controladorCompra.php">Tienda</a>
                <a href="../back/controladorReservas.php">Reservas</a>
                <a href="../back/controladorLogin.php">Inicio de Sesión</a>
           </div>
       </div>
    </header>
    <script type="text/javascript" src="../front/javascript/nav.js"></script>
</body>
<!--Autor: Fco. Manuel Martínez Vázquez-->
</html>