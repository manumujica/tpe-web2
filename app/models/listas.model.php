<?php
require_once './app/helpers/db.helper.php';

class ListasModel {
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

    public function getDiscosFiltrados($artistaDeseado){
        echo"| variable recibida en getDiscosFiltrados(): $artistaDeseado ";
        $query = $this->db->prepare("SELECT discos.*, artistas.artist_name as artist_name FROM discos JOIN artistas ON discos.id_artist = artistas.id_artist WHERE artistas.artist_name = '$artistaDeseado'");
        $query->execute();
        $discos = $query->fetchAll(PDO::FETCH_OBJ);
        echo"| Arreglo de discos en getDiscosFiltrados(): ";
        var_dump($discos);
        return $discos;
    }
    
    public function getArtistas(){
        $query = $this->db->prepare('SELECT * FROM artistas');
        $query->execute();
        
        $artistas = $query->fetchAll(PDO::FETCH_OBJ);

        return $artistas;
    }
}