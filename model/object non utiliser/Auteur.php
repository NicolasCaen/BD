<?php

require_once('Connection_pdo.php');

class Auteur {
  public $aut_id;
  public $$aut_nom;
}

class AuteurBDD {

  function lireAuteurParId($aut_id) {
    global $DB_CONNECTION_INFO;
   // $db= null;
    $db= $DB_CONNECTION_INFO->creerConnexion();
    $st = $db->prepare("SELECT * FROM auteurs WHERE aut_id= :id");
    $st->bindParam(":id", $aut_id);
    $st->execute();
    $resultat= $st->fetchObject('Auteur');
    if ($resultat) {
      return $resultat;
    } else {
      return false;
    }
    // La connexion est automatiquement fermée car $db est locale.
  }


  function lireAuteur($aut_nom) {
    global $DB_CONNECTION_INFO;
   // $db= null;
    $db= $DB_CONNECTION_INFO->creerConnexion();
    $st = $db->prepare("SELECT * FROM auteurs WHERE aut_nom= :aut_nom");
    $st->bindParam(":aut_nom", $aut_nom);
    $st->execute();
    $resultat= $st->fetchObject('Auteur');
    if ($resultat) {
      return $resultat;
    } else {
      return false;
    }
    // La connexion est automatiquement fermée car $db est locale.
  }

  // Créer un auteurs
  function creer($auteur) {
    global $DB_CONNECTION_INFO;
    //$db= null;
    $db= $DB_CONNECTION_INFO->creerConnexion();
    $st = $db->prepare("INSERT INTO auteurs (aut_nom) VALUES (?)");
    $st->bindValue(1, $auteur->aut_nom);
    $st->execute();
    $auteurs->id_auteurs= $db->lastInsertId();
  }
}

?>