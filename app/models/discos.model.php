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

    public function insertAlbum($album_name, $release_date, $id_artist, $duration){
    
        $query = $this->db->prepare('INSERT INTO discos (album_name, release_date, id_artist, duration) VALUES (?,?,?,?)');
        $query->execute([$album_name, $release_date, $id_artist, $duration]);
        return $this->db->lastInsertId();
    }

    public function deleteAlbum($id){
        $query = $this->db->prepare('DELETE FROM discos WHERE id_album = ?');
        $query->execute([$id]);
    }

    public function updateAlbum($id){
        $query = $this->db->prepare('UPDATE discos SET selected = 1 WHERE id_album = ?');
        $query->execute([$id]);
    }

    public function restoreAlbum($id){
        $query = $this->db->prepare('UPDATE discos SET selected = 0 WHERE id_album = ?');
        $query->execute([$id]);
    }
}