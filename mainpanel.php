<?php 
session_start(); ?>

<?php if($_SESSION['activate']){?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!--Favicon-->
    <link rel="shortcut icon" href="https://s3-sa-east-1.amazonaws.com/tailoy-web/logo/icon.gif"/>
    
    <!--Scrips header-->
    <script src="assets/bootstrap/jquery-3.4.1.min.js"></script>
    <script src="assets/bootstrap/popper.min.js"></script>
    <script src="assets/bootstrap/bootstrap.min.js"></script>
    <script src="assets/sweetalert2/sweetalert2.js"></script>
    <title>Tai Loy - Mainpanel</title>

</head>
<body>
<!--Navbar -->
<div class="container">
            <header class="encabezado">
                <nav class="navbar navbar-expand-md navbar-light fixed-top">
                    <div class="container">   
                        <a class="navbar-brand" href="#">AULA</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuprincipal">
                            <i class="icon-bar"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="menuprincipal">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#!">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#!">Nosotros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#!">Servicios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#!">Portafolio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#!">Contacto</a>
                                </li>
                            </ul>
                        </div>
                    </div> 
                </nav>
            </header>
        </div>

<script src="assets/js/admin/app.js"></script>


</body>
</html>
<?php }else{ 
    header('Location: ./login');
} ?>