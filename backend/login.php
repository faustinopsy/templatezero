<?php
include "../vendor/autoload.php";

use App\Controller\UsuariosController;

    $body = json_decode(file_get_contents('php://input'), true);

    $control = new UsuariosController();
    
    $resultado=$control->getUsersByEmail($body);
    
    if(password_verify($body['senha'],$resultado[0]['senha'])){
        echo json_encode(['status'=>true]);
    }else{
        echo json_encode(['status'=>false, 'error'=>" Email ou Senha errados"]);
    
    }





?>