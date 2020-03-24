<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilo.css">
    
    <!--Favicon-->
    <link rel="shortcut icon" href="https://s3-sa-east-1.amazonaws.com/tailoy-web/logo/icon.gif"/>
    
    <!--Scrips header-->
    <script src="assets/bootstrap/jquery-3.4.1.min.js"></script>
    <script src="assets/bootstrap/popper.min.js"></script>
    <script src="assets/bootstrap/bootstrap.min.js"></script>
    <script src="assets/sweetalert2/sweetalert2.js"></script>
    <title>Tai Loy - Landings</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="panel_login col-sm-6 col-md-6 offset-md-3 col-lg-6 offset-lg-3">
                <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3 text-center">
                    <label for=""></label>
                </div> 
                <div class="form-group col-sm-12 col-md-12 col-lg-8 offset-lg-2 mt-5">
                    <input type="text" class="form-control" id="user" name="user" placeholder="Usuario" tabindex='1'>
                </div> 
                <div class="form-group col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                   <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" tabindex='2'>
                </div> 
                <div class="form-group text-center mb-0">
                    <button type="button" id="btn_login" class="btn btn-success">Enviar</button>
                </div> 
            </div>
        </div>
    </div>
    <script src="assets/js/admin/login.js"></script>
</body>
</html>
