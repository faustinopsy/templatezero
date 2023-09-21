<?php
include "../vendor/autoload.php";

use App\Controller\UsuariosController;

$control = new UsuariosController();
$body = json_decode(file_get_contents('php://input'), true);

if(!$control->getUsersByEmail($body)){
    
    if($control->criarUsers($body)){
        echo json_encode(['status'=> true]);
    }
}else{
     echo json_encode(['status'=> false]);
}




?>