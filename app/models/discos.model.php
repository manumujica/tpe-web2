<?php

class DiscosModel {
    
    protected $db;

    public function __construct() {
        $this->db = DBHelper::getConection();
    }

    public function getAlbums(){
        $query = $this->db->prepare('SELECT discos.*, artistas.artist_name as artist_name FROM discos JOIN artistas ON discos.id_artist = artistas.id_artista');
        $query->execute();
        $albums = $query->fetchAll(PDO::FETCH_OBJ);
        return $albums;
    }
}