<?php
require_once './app/helpers/db.helper.php';

class ListasModel {
    protected $db;

    public function __construct() {
        $this->db = DBHelper::getConection();
   //     $this->deploy();
    }

  /*  private function _deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if(count($tables) == 0) {
            $sql =<<<END
		END;
        $this->db->query($sql);
        }
    }
*/

    public function getDiscos(){
        $query = $this->db->prepare("SELECT discos.*, artistas.artist_name as artist_name FROM discos JOIN artistas ON discos.id_artist = artistas.id_artist");
        $query->execute();
        
        $discos = $query->fetchAll(PDO::FETCH_OBJ);

        return $discos;
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
    
    public function getArtistas(){
        $query = $this->db->prepare('SELECT * FROM artistas');
        $query->execute();
        
        $artistas = $query->fetchAll(PDO::FETCH_OBJ);

        return $artistas;
    }
    public function getSelectedAlbums(){
        $query = $this->db->prepare('SELECT discos.*, artistas.artist_name as artist_name FROM discos JOIN artistas ON discos.id_artist = artistas.id_artist WHERE discos.selected = 1');
        $query->execute();
        $albums = $query->fetchAll(PDO::FETCH_OBJ);
        return $albums;
    }
    public function getSelectedArtists(){
        $query = $this->db->prepare('SELECT * FROM artistas WHERE artistas.selected = 1');
        $query->execute();
        $albums = $query->fetchAll(PDO::FETCH_OBJ);
        return $albums;
    }
}