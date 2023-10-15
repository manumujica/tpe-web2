<?php
require_once './app/helpers/db.helper.php';

class ListaDiscosModel {
    protected $db;

    public function __construct() {
        $this->db = DBHelper::getConection();
    }

    public function getDiscos(){
        $query = $this->db->prepare('SELECT * FROM discos');
        $query->execute();
        
        $discos = $query->fetchAll(PDO::FETCH_OBJ);

        return $discos;
    }
}