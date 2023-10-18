<?php
require_once 'model.php';

require_once './app/helpers/db.helper.php';

class ArtistasModel{
    protected $db;

    public function __construct() {
        $this->db = DBHelper::getConection();
        $model = new Model;
        $model->deploy();
    }

    public function getArtists(){
        $query = $this->db->prepare('SELECT * FROM artistas');
        $query->execute();
        $artists = $query->fetchAll(PDO::FETCH_OBJ);
        return $artists;
    }

    public function insertArtist($artist_name, $artist_dob, $artist_pob){
        $query = $this->db->prepare('INSERT INTO artistas (artist_name, artist_dob, artist_pob) VALUES (?,?,?)');
        $query->execute([$artist_name, $artist_dob, $artist_pob]);
        return $this->db->lastInsertId();
    }

    public function deleteArtist($id){
        $query = $this->db->prepare('DELETE FROM artistas WHERE id_artist = ?');
        $query->execute([$id]);
    }

    public function updateArtist($id){
        $query = $this->db->prepare('UPDATE artistas SET selected = 1 WHERE id_artist = ?');
        $query->execute([$id]);
    }

    public function restoreArtist($id) {
        $query = $this->db->prepare('UPDATE artistas SET selected = 0 WHERE id_artist = ?');
        $query->execute([$id]);
    }
}