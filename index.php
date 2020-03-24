<?php
if(isset($_GET["url"])){
    $url=$_GET["url"];
    if($url!=''){
        require($url.".php");
    }
}

   
//header("Location:landings/".$url.".php");
/*
echo $_SERVER['HTTP_HOST'];
echo $_SERVER['DOCUMENT_ROOT'];

$filename='archivocreado';
    $ruta=$_SERVER['HTTP_HOST'];
    $ruta_file=$_SERVER['DOCUMENT_ROOT'];
    $fileLocation   = $ruta_file."/".$filename."/".$filename.".php";
    mkdir($ruta_file."/file");*/
/*if(!mkdir($ruta, 0777, true)) {
    echo 'Fallo al crear las carpetas...';
}*/
    
    /*
    $content        = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>LANDING DESAFIO</h1>
        <button id="btn">BOTON</button>
        <script src=../js/eventos.js></script>
    </body>
    </html>';
    if(!file_exists($fileLocation)){
        file_put_contents($fileLocation, $content);
    }
    echo $ruta ;*/
  
    ?>

