<?php
require_once 'model.php';
class UserModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe_web_2;charset=utf8', 'root', '');
        $model = new Model;
        $model->deploy();
    }

    public function getByUsername($username){
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE username = ?');
        $query->execute([$username]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insertUser($username, $hash){
    
        $query = $this->db->prepare('INSERT INTO usuarios (username, password) VALUES (?,?)');
        $query->execute([$username, $hash]);
        return $this->db->lastInsertId();
    }

    public function getAllUsers(){
        $query = $this->db->prepare('SELECT * FROM usuarios');
        $query->execute();
        $usuarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $usuarios;
    }
}