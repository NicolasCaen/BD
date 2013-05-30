<?php
require_once('Connection_pdo.php');
require_once('Utilisateur.php');


//------------------------------------Controle de la connexion--------------------------
class ConnexionControle  {
    
  function executer() {
    global $_POST;
    global $vue;
    
    if (isset($_POST['login']) || isset($_POST['password'])) {
      $con_user= new ConnexionUtilisateur();
      $con_user->connecterUtilisateur($_POST['login'], $_POST['password']);
        if ($con_user->connexionCorrecte()) {
          // on enregistre dans la session
        	$_SESSION['utilisateur']= $con_user->utilisateur;
        	// On demande l'affichage de la page d'accueil.
        	$this->redirect= "index.php";
        } 
    
    }
  } 
}
//----------------------------------connexion utilisateur bdd----------------------------------

class ConnexionUtilisateur {
  public $utilisateur;

  function connecterUtilisateur($login, $password) {
    global $DB_CONNECTION_INFO;
    $utilisateur= null;
    $dao= new UtilisateurBDD();
    $u= $dao->lireUtilisateur($login);
    if ($u != null && $u->password === $password) {
      $this->utilisateur= $u;
      $this->utilisateur->password= null; // On efface le mot de passe 
      // on ne veut pas le garder trop longtemps en mémoire vive.
    }
  }
  
  function connexionCorrecte() {
    return $this->utilisateur != null;
  }  
}
//------------------------------Deconnexion---------------------------------------------
class DeconnexionControle {
  
  function executer() {
    $this->redirect= "index.php";
    unset($_SESSION['utilisateur']);
  } 
}


?>