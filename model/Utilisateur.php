<?php

require_once('Connection_pdo.php');

class Utilisateur {
  public $id_utilisateur;
  public $login;
  public $password;
  public $signature;
}

class UtilisateurBDD {

  function lireUtilisateurParId($id) {
    global $DB_CONNECTION_INFO;
   // $db= null;
    $db= $DB_CONNECTION_INFO->creerConnexion();
    $st = $db->prepare("SELECT * FROM utilisateur WHERE id_utilisateur= :id");
    $st->bindParam(":id", $id);
    $st->execute();
    $resultat= $st->fetchObject('Utilisateur');
    if ($resultat) {
      return $resultat;
    } else {
      return false;
    }
    // La connexion est automatiquement fermée car $db est locale.
  }


  function lireUtilisateur($login) {
    global $DB_CONNECTION_INFO;
   // $db= null;
    $db= $DB_CONNECTION_INFO->creerConnexion();
    $st = $db->prepare("SELECT * FROM utilisateur WHERE login= :login");
    $st->bindParam(":login", $login);
    $st->execute();
    $resultat= $st->fetchObject('Utilisateur');
    if ($resultat) {
      return $resultat;
    } else {
      return false;
    }
    // La connexion est automatiquement fermée car $db est locale.
  }

  // Créer un utilisateur
  function creer($utilisateur) {
    global $DB_CONNECTION_INFO;
    //$db= null;
    $db= $DB_CONNECTION_INFO->creerConnexion();
    $st = $db->prepare("INSERT INTO utilisateur (login, password, signature) VALUES (?,?,?)");
    $st->bindValue(1, $utilisateur->login);
    $st->bindValue(2, $utilisateur->password);
    $st->bindValue(3, $utilisateur->signature);
    $st->execute();
    $utilisateur->id_utilisateur= $db->lastInsertId();
  }
}

?>