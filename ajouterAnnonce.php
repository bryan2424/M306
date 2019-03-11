<?php

/*
  Projet: M306 - Annonces
  Description: Gestion du formulaire d'ajout d'annonce
  Auteur: Jacot-dit-Montandon Ludovic
  Version: 1.0
  Date: 2018-19
 */
session_start();
require_once 'bdd.php';

if (isset($_POST["title"])) {
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
} else {
    $title = "";
}
if (isset($_POST["description"])) {
    $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
} else {
    $description = "";
}
if (isset($_POST["price"])) {
    $prix = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_INT);
} else {
    $prix = "";
}
if (isset($_POST["type"])) {
    $idtype = filter_input(INPUT_POST, "type", FILTER_SANITIZE_NUMBER_INT);
}
if ($title != "" && $description != "" && $prix != "") {
    if (isset($_FILES["image"])) {
        $dossier = 'upload/';
        $nomImage = $_FILES["image"]["name"];
        $typeImage = $_FILES["image"]["type"];
        $datePost = date("Y-m-d H:i:s");
        echo $_SESSION["idUser"];
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $dossier . $nomImage)) { //Si la fonction renvoie TRUE, c'est que ça a fonctionné
            insertPost($title, $description, $prix, $nomImage, $typeImage, $_SESSION["idUser"], $idtype);
            header("Location: index.php?types=1");
        }
        //Sinon (la fonction renvoie FALSE).
        else {
            echo "Echec de l\'upload !";
        }
    }
}

var_dump($idtype, $title, $description, $prix);
