<?php
/*
Projet: M306 - Annonces
Description: Gestion du formulaire d'ajout d'annonce
Auteur: Jacot-dit-Montandon Ludovic
Version: 1.0
Date: 2018-19
*/
require_once 'bdd.php';

if (isset($_POST["title"])) {
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
} else {
     $title = "";
}
if (isset($_POST["description"]))
{
    $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
} else {
    $description = "";
}
if(isset($_POST["price"]))
{
    $prix = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_INT);
} else {
    $prix = "";
}
if (isset($_POST["type"])) {
    $idtype = filter_input(INPUT_POST, "type", FILTER_SANITIZE_NUMBER_INT);
}
if($title != "" && $description != "" && $prix != "")
{
    insertPost($title, $description, $prix, $_SESSION["IdUser"], $idtype);
    header("Location: index.php");
}

var_dump($idtype, $title, $description, $prix);