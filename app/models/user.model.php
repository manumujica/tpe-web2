<?php
require_once 'model.php';
class UserModel extends Model {
    protected $db;

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