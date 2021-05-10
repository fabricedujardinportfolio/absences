<?php
//Ne pas oublier d'ajouter le fichier posts.php

?>
<?php require '../model/header.php';?>
    <?php  
        require '../classes/posts.php';
        $updatePoste = new Post();
        $updatePoste = $updatePoste->setUpdate($_GET['id'],$_GET['date_start'],$_GET['date_end'],$_GET['motif']);
        ?>
<?php require '../model/footer.php';?>