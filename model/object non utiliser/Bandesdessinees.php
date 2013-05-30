<?php

require_once('Connection_pdo.php');

class Bandesdessinees {
  public $bd_id;
  public $bd_titre;
  public $bd_resume;
  public $bd_image;
  public $bd_auteur_id
}

class BandesdessineesBDD {

  function lireBandesdessineesParId($bd_id) {
    global $DB_CONNECTION_INFO;
   // $db= null;
    $db= $DB_CONNECTION_INFO->creerConnexion();
    $st = $db->prepare("SELECT * FROM bandesdessinees WHERE id_bandesdessinees= :id");
    $st->bindParam(":id", $bd_id);
    $st->execute();
    $resultat= $st->fetchObject('Bandesdessinees');
    if ($resultat) {
      return $resultat;
    } else {
      return false;
    }
    // La connexion est automatiquement fermée car $db est locale.
  }


  function lireBandesdessineesParTitre($titre) {
    global $DB_CONNECTION_INFO;
   // $db= null;
    $db= $DB_CONNECTION_INFO->creerConnexion();
    $st = $db->prepare("SELECT * FROM bandesdessinees WHERE bd_titre= :bd_titre");
    $st->bindParam(":bd_titre", $titre);
    $st->execute();
    $resultat= $st->fetchObject('Bandesdessinees');
    if ($resultat) {
      return $resultat;
    } else {
      return false;
    }
    // La connexion est automatiquement fermée car $db est locale.
  }
    function lireBandesdessineesParTitre($auteur) {
    global $DB_CONNECTION_INFO;
   // $db= null;
    $db= $DB_CONNECTION_INFO->creerConnexion();
    $st = $db->prepare("SELECT * FROM bandesdessinees WHERE bd_auteur_id= :bd_auteur");
    $st->bindParam(":bd_auteur", $auteur);
    $st->execute();
    $resultat= $st->fetchObject('Bandesdessinees');
    if ($resultat) {
      return $resultat;
    } else {
      return false;
    }
    // La connexion est automatiquement fermée car $db est locale.
  }

  // Créer un bandesdessinees
  function creer($bandesdessinees) {
    global $DB_CONNECTION_INFO;
    //$db= null;
    $db= $DB_CONNECTION_INFO->creerConnexion();
    $st = $db->prepare("INSERT INTO bandesdessinees (bd_titre,bd_resume,bd_image,bd_auteur_id) VALUES (?,?,?,?)");
    $st->bindValue(1, $bandesdessinees->bd_titre);
    $st->bindValue(2, $bandesdessinees->bd_resume);
    $st->bindValue(3, $bandesdessinees->bd_image);
	$st->bindValue(4, $bandesdessinees->bd_auteur_id);
    $st->execute();
    $bandesdessinees->id_bandesdessinees= $db->lastInsertId();
  }
}

?>