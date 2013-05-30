<?php

require_once('Connection_pdo.php');

class BdRecherche {
  public $bd_id;
  public $bd_titre;
  public $bd_resume;
  public $bd_image;
  public $bd_auteur_id
  public $bd_auteur_nom
}

class BdRechercheBDD {

    function rechercheBandesdessineesParAuteur($auteur) {
    global $DB_CONNECTION_INFO;
   // $db= null;
    $db= $DB_CONNECTION_INFO->creerConnexion();
    $st = $db->prepare("SELECT bd_id,bd_titre, bd_resume,bd_image, bd_auteur_id, auteurs.aut_nom as auteur 
						FROM bandesdessinees
						LEFT JOIN auteurs ON bandesdessinees.bd_auteur_id=auteurs.aut_id
						WHERE  auteurs.aut_nom like :bd_auteur");			
    $st->bindParam(":bd_auteur", $auteur);
    $st->execute();
    $resultat= $st->fetchObject('BdRecherche');
    if ($resultat) {
      return $resultat;
    } else {
      return false;
    }
    // La connexion est automatiquement fermée car $db est locale.
  }
  
    function rechercheBandesdessineesParTheme($theme) {
    global $DB_CONNECTION_INFO;
   // $db= null;
    $db= $DB_CONNECTION_INFO->creerConnexion();
    $st = $db->prepare("SELECT bd_titre, bd_resume,bd_id, bd_auteur_id,bd_image, auteurs.aut_nom as auteur ,th.th_intitule
						FROM bandesdessinees bd
						INNER JOIN auteurs ON bd.bd_auteur_id=auteurs.aut_id 
						INNER JOIN liens_bd_themes l  ON    bd.bd_id= l.lien_bd_id
						INNER JOIN themes th  ON    th.th_id= l.lien_themes_id 
						WHERE  th.th_intitule like :bd_theme");			
    $st->bindParam(":bd_theme", $theme);
    $st->execute();
    $resultat= $st->fetchObject('BdRecherche');
    if ($resultat) {
      return $resultat;
    } else {
      return false;
    }
    // La connexion est automatiquement fermée car $db est locale.
  }
  
}

?>