<?php
/*
Projet: M306 - Annonces
Description: Navigation
Auteur: Jacot-dit-Montandon Ludovic
Version: 1.0
Date: 2018-19
*/
require_once 'bdd.php';

?>

<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <?php
        //La variable $arrCategory contient les champs de la table
        $arrTypes = getTypes();
        //Pour chaques catégories, un lien est créé avec un paramètre sur la page index
        foreach($arrTypes as $types)
        {
        echo '<a class="p-2 text-muted" href="index.php?types='. $types["IdType"] .'">'. $types["Name"] .'</a>';
        }
        
        ?>
    </nav>
</div>

