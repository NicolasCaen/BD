<?php
  /*
   *CONNEXION PDO pour une compatibilité avec d'autres BDD que mySQL
   */
   
//recuperation des données de connexion dans le fichier ini
$ini_array = parse_ini_file("ini/connect.ini");

$serveur_ini=$ini_array["Serveur"];
$bdd_ini=$ini_array["Bdd"];
$login_ini=$ini_array["login"];
$password_ini=$ini_array["password"];



class DBInfo {
  public $serveur;
  public $db;
  public $login;
  public $password;

  function DBInfo($serveur, $db, $login, $password) {
    $this->serveur= $serveur;
    $this->db= $db;
    $this->login= $login;
    $this->password= $password;
  } 

  function creerConnexion() {
    return new PDO("mysql:host=$this->serveur;dbname=$this->db", $this->login, $this->password);
  }
}

$DB_CONNECTION_INFO= new DBInfo($serveur_ini, $bdd_ini, $login_ini, $password_ini);
?>
