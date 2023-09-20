<?php
include "../vendor/autoload.php";

use App\Controller\UsuariosController;

$control = new UsuariosController();

$resultado=$control->getUsers();

var_dump($resultado);

?>