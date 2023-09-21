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
    public function getUsersByEmail($body){
        $resultado = $this->model->select('users',['email'=>$body['email']]);
        return $resultado;
    }
    public function criarUsers($data){
        $this->usuarios->setNome($data['nome']);
        $this->usuarios->setEmail($data['email']);
        $this->usuarios->setSenha($data['senha']);

        $resultado = $this->model->insert('users',
        [
            'nome'=>$this->usuarios->getNome(),
            'email'=>$this->usuarios->getEmail(),
            'senha'=>$this->usuarios->getSenha(),
        ]);
        return $resultado;
    }

}