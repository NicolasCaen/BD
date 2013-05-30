<?php

require_once('Connection_pdo.php');

class Commentaire {
  public $com_id;
  public $com_bd_id;
  public $com_date;
  public $com_auteur;
  public $com_texte;
  public $com_visibility;
}

class CommentaireBDD {

  function lireCommentaireParId($id_commentaire) {
    global $DB_CONNECTION_INFO;
   // $db= null;
    $db= $DB_CONNECTION_INFO->creerConnexion();
    $st = $db->prepare("SELECT * FROM commentaires WHERE com_id= :id");
    $st->bindParam(":id", $id_commentaire);
    $st->execute();
    $resultat= $st->fetchObject('Commentaire');
    if ($resultat) {
      return $resultat;
    } else {
      return false;
    }
    // La connexion est automatiquement fermée car $db est locale.
  }


  function lireAllCommentaire($com_visibility) {
    global $DB_CONNECTION_INFO;
   // $db= null;
    $db= $DB_CONNECTION_INFO->creerConnexion();
    $st = $db->prepare("SELECT * FROM commentaires WHERE visibility= :visibility");
    $st->bindParam(":visibility", $com_visibility);
    $st->execute();
    $resultat= $st->fetchObject('Commentaire');
    if ($resultat) {
      return $resultat;
    } else {
      return false;
    }
    // La connexion est automatiquement fermée car $db est locale.
  }

  // Créer un commentaire
  function creer($commentaire) {
    global $DB_CONNECTION_INFO;
    //$db= null;
    $db= $DB_CONNECTION_INFO->creerConnexion();
    $st = $db->prepare("INSERT INTO commentaire ( com_bd_id,com_auteur,com_text,visibility) VALUES (?,?,?,'n')");
    $st->bindValue(1, $commentaire->com_bd_id);
    $st->bindValue(2, $commentaire->com_auteur);
    $st->bindValue(3, $commentaire->com_text);
	$st->execute();
    $commentaire->id_commentaire= $db->lastInsertId();
  }
}

?>