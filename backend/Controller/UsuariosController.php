<?php
namespace App\Controller;
use App\Model\Usuarios;
use App\Config\Model;

class UsuariosController{
    private $usuarios;
    private $model;

    public function __construct() {
        $this->usuarios = new Usuarios();  
        $this->model = new Model();
    }

    public function getUsers(){
        $resultado = $this->model->select('users',[]);
        return $resultado;
    }
    public function criarUsers($data){
      
        $resultado = $this->model->insert('users',$data);
        return $resultado;
    }

}