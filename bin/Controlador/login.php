<?php 
session_start();


$data_request=$_POST; //DATA RECIBIDO POR EL AJAX de login.js

if($data_request['action']=='login'){
    $user="tailoy";
    $pass="tailoy";
    if($data_request['user']==$user && $data_request['pass']==$pass){
        print_r(json_encode(array("validate"=>true,"user"=>$user)));
    }else{
        print_r(json_encode(array("validate"=>false,"user"=>'')));
    }
    $_SESSION['activate']=true;
    $_SESSION['admin']=array('username'=>$user);
}

/*
$request_body = file_get_contents('php://input');

$data = json_decode($request_body);

print_r($data);*/
?>