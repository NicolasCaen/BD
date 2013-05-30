<?php

// Retourne vrai si l'utilisateur est connecté
function estConnecte() {
  return isset($_SESSION['utilisateur']);
}
    
// Retourne vrai si l'utilisateur est l'administrateur.
function estAdministrateur() {
  return estConnecte() &&  $_SESSION['utilisateur']->id_utilisateur == 1;
}

//function pvar($name) {
//  global $vue;
//  if (! empty($vue[$name])) {
//    htmlspecialchars($vue[$name]);
//  } 
//}

?>