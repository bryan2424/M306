<?php

/*
  Auteur: Loïc Burnand
  Projet: M306 - Site d'annonces
  Date: 22 Janvier 2019
  Employeur: CFPTI

  Description de la page:
  C'est la page gérant la connexion à la base de donnée.
 */
DEFINE('SERVER', 'localhost');
DEFINE('PORT', '');
DEFINE('PSEUDO', 'root');
DEFINE('PWD', '');
DEFINE('DB_NAME', 'M306');

// Connecte la base de données
function connectDB() {
    static $db = null;
    if ($db === null) {
        try {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $db = new PDO("mysql:host=" . SERVER . ";port=" . PORT . ";dbname=" . DB_NAME, PSEUDO, PWD, $pdo_options);
            $db->exec('SET CHARACTER SET utf8');
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    return $db;
}

//Récupère toutes les annonces sans tri
// renvoie un tableau contenant des objets Annonces
function getAllAnnonces() {
    $annonces = [];
    $db = connectDB();
    $query = $db->prepare('SELECT Name, Description, Prix, IdUser, IdType FROM ANNONCES');
    if ($result = $query->execute()) {
        $i = 0;
        foreach ($result as $annonce) {
            $annonces[$i] = new Annonce();
            $annonces[$i]->Name = (isset($annonce['Name']) ? $annonce['Name'] : NULL);
            $annonces[$i]->Description = (isset($annonce['Description']) ? $annonce['Description'] : NULL);
            $annonces[$i]->Prix = (isset($annonce['Prix']) ? $annonce['Prix'] : NULL);
            $annonces[$i]->IdUser = (isset($annonce['IdUser']) ? $annonce['IdUser'] : NULL);
            $annonces[$i]->IdType = (isset($annonce['IdType']) ? $annonce['IdType'] : NULL);
            $i++;
        }
        return $annonces;
    } else {
        return false;
    }
}

//récupère tous les types
//renvoie un tableau contenant des objets Type
function getAllTypes() {
    $Types = [];
    $db = connectDB();
    $query = $db->prepare('SELECT IdType, Name FROM TYPES');
    if ($result = $query->execute()) {
        $i = 0;
        foreach ($result as $Type) {
            $Types[$i] = new Type();
            $Types[$i]->IdType = (isset($Type['IdType']) ? $Type['IdType'] : NULL);
            $Types[$i]->Name = (isset($Type['Name']) ? $Type['Name'] : NULL);
            $i++;
        }
        return $Types;
    } else {
        return false;
    }
}

//récupère l'id, le pseudo et l'email de tous les utilisateurs
//renvoie un tableau contenant des objets User
function getAllUsers() {
    $Users = [];
    $db = connectDB();
    $query = $db->prepare('SELECT IdUser, Pseudo, Email FROM USERS');
    if ($result = $query->execute()) {
        $i = 0;
        foreach ($result as $User) {
            $Users[$i] = new User();
            $Users[$i]->IdUser = (isset($User['IdUser']) ? $User['IdUser'] : NULL);
            $Users[$i]->Pseudo = (isset($User['Pseudo']) ? $User['Pseudo'] : NULL);
            $Users[$i]->Name = (isset($User['Email']) ? $User['Email'] : NULL);
            $i++;
        }
        return $Users;
    } else {
        return false;
    }
}


function getTypes() {
    try {
        $db = connectDB();
        $query = $db->prepare('SELECT IdType, Name FROM TYPES');
        $query->execute();
        $resultat = $query->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function getAnnonces() {
    try {
        $db = connectDB();
        $query = $db->prepare('SELECT Name, Description, Prix, IdUser, IdType FROM ANNONCES');
        $query->execute();
        $resultat = $query->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

/**
 * Insert une nouvelle annonces dans la base de données 
 */
function insertPost($name, $description, $prix, $iduser, $idtype){
    try {
        $db = connectDB();
        $query = $db->prepare('INSERT INTO `annonces`(`Name`, `Description`, `Prix`, `IdUser`, `IdType`) VALUES (:name, :description, :prix, :iduser, :idtype)');
        $query->bindParam(":name", $name, PDO::PARAM_INT);
        $query->bindParam(":description", $description, PDO::PARAM_INT);
        $query->bindParam(":prix", $prix, PDO::PARAM_INT);
        $query->bindParam(":iduser", $iduser, PDO::PARAM_INT);
        $query->bindParam(":idtype", $idtype, PDO::PARAM_INT);
        $query->execute();
        return true;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}