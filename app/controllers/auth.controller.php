<?php

include_once './app/views/auth.view.php';

class AuthController{

    private $view;

    function __construct(){
        $this->view = new AuthView;
    }

    public function showLogin(){
        $this->view->showLogin();
    }
}