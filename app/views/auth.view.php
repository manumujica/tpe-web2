<?php

class AuthView{
    function showLogin($error = null){
        require_once './templates/loginform.phtml';
    }

    function showRegisterForm($error = null){
        require_once './templates/registerform.phtml';
    }
}