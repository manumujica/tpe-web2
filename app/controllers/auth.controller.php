<?php

include_once './app/views/auth.view.php';
include_once './app/models/user.model.php';
require_once './app/helpers/auth.helper.php';

class AuthController{

    private $view;
    private $model;

    function __construct(){
        $this->view = new AuthView;
        $this->model = new UserModel;
    }

    public function showLogin(){
        $this->view->showLogin();
    }
    
    public function verifyUser(){
        if(empty($_POST['username']) || empty($_POST['password'])){
            $this->view->showLogin("Error en la validación. Ambos campos deben estar completos.");
            return;
        }

        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = $this->model->getByUsername($username);

        if($user && password_verify($password, $user->password)){
            AuthHelper::login($user);
            header('Location: ' . BASE_URL);
        } else {
           $this->view->showLogin("Contraseña o nombre de usuario incorrectos.");
        }
    }
    
    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL);    
    }


    public function registerUser(){
        $this->view->showRegisterForm();
    }

    public function verifyRegistry(){
        if(empty($_POST['username']) || empty($_POST['password'])){
            $this->view->showRegisterForm("Error en la validación. Ambos campos deben estar completos.");
            return;
        }

        $username = $_POST['username'];

        $usuarios = $this->model->getAllUsers();
        foreach($usuarios as $usuario){
            if($usuario->username == $username){
                $this->view->showRegisterForm("El nombre de usuario ya está en uso. Inténtelo nuevamente.");
                return;
            }
        }

        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $id = $this->model->insertUser($username, $hash);

        if($id){
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showRegisterForm("Error. No se pudo registrar");
        }
    }
}