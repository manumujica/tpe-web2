<?php
require_once 'model.php';
require_once './app/helpers/db.helper.php';

class DiscosModel extends Model {
    
    protected $db;


    public function getAlbums(){
        $query = $this->db->prepare('SELECT discos.*, artistas.artist_name as artist_name FROM discos JOIN artistas ON discos.id_artist = artistas.id_artist');
        $query->execute();
        $albums = $query->fetchAll(PDO::FETCH_OBJ);
        return $albums;
    }

    public function getArtistsForAlbum(){
        $query = $this->db->prepare('SELECT * FROM artistas');
        $query->execute();
        $artists = $query->fetchAll(PDO::FETCH_OBJ);
        return $artists;
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

    public function getDiscoById($id){
        $query = $this->db->prepare("SELECT discos.*, artistas.artist_name as artist_name FROM discos JOIN artistas ON discos.id_artist = artistas.id_artist WHERE discos.id_album = '$id'");
        $query->execute();
        $disco= $query->fetchAll(PDO::FETCH_OBJ);
        return $disco;
    }

    public function getDiscosFiltrados($artistaDeseado){
        $query = $this->db->prepare("SELECT discos.*, artistas.artist_name as artist_name FROM discos JOIN artistas ON discos.id_artist = artistas.id_artist WHERE artistas.artist_name = '$artistaDeseado'");
        $query->execute();
        $discos = $query->fetchAll(PDO::FETCH_OBJ);
        return $discos;
    }

    public function getSelectedAlbums(){
        $query = $this->db->prepare('SELECT discos.*, artistas.artist_name as artist_name FROM discos JOIN artistas ON discos.id_artist = artistas.id_artist WHERE discos.selected = 1');
        $query->execute();
        $albums = $query->fetchAll(PDO::FETCH_OBJ);
        return $albums;
    }
    
}