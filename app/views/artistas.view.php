<?php

class ArtistasView{
    public function showArtists($artists){
        ?>
        <table>
            <tr>
            <th>Nombre</th>
            <th>Fecha de nacimiento</th>
            <th>País de nacimiento</th>
            <th>Eliminar</th>
            <th>Selección</th>
            </tr><?php
            foreach ($artists as $artist) { ?>
                <tr>
                <td><?php echo $artist->artist_name ?></td>
                <td><?php echo $artist->artist_dob ?></td>
                <td><?php echo $artist->artist_pob ?></td>
                <td><a href="eliminarartista/<?php echo $artist->id_artist ?>">eliminar</a></td>
                <td><?php if(!$artist->selected){ ?> <a href="seleccionarartista/<?php echo $artist->id_artist ?>">agregar a selección</a><?php }
                else {?> <a href="deseleccionarartista/<?php echo $artist->id_artist ?>">quitar de selección</a> <?php } ?></td>
                </tr>
            <?php } ?>
        </table> <?php
    }

    public function showAddArtist(){
        require_once './templates/addartist.phtml';
    }

    public function showError($error){
        require 'templates/error.phtml';
    }
}