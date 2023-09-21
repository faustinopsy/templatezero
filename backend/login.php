<?php
include "../vendor/autoload.php";

use App\Controller\UsuariosController;
$body = json_decode(file_get_contents('php://input'), true);

$control = new UsuariosController();
$resultado=$control->getUsersById($body);

if(!$resultado || !password_verify($body['senha'], $resultado[0]['senha'])){
    echo json_encode(['status'=>false, 'error'=>"Usuários ou senha errados"]);
    exit;
}

if(password_verify($body['senha'], $resultado[0]['senha'])){
    session_start();
    $_SESSION['email']=$body['email'];
    echo json_encode(['status'=>true]);
    exit;
}


?>