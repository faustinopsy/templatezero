<?php
include "../vendor/autoload.php";

use App\Controller\UsuariosController;

$control = new UsuariosController();
$body = json_decode(file_get_contents('php://input'), true);

$control->criarUsers($body);


?>