<?php

  /**
   * Gestion des messages destinés à l'utilisateur.  Leur texte est
   * stocké en session afin de survivre éventuellement à
   * l'utilisation d'une redirection.
   * 
   * Pour pouvoir changer le système si nous le désirons, nous avons
   * donc ajouté cette petite couche d'abstrchoix.
   * 
   * (de plus, en écrivant directement 
   *    $_SESSION['messages'][]= "mon message";
   * on court le risque, par exemple, de mal orthographier "messages".
   * dans ce cas, il ne se passe rien, pas de message d'erreur.
   * l'utilisation d'ajouteMessage nous protège de ce problème.
   */
//if (! isset($_SESSION['messages'])) {
//  effaceMessages();
//}
//
//function effaceMessages() {
//  $_SESSION['messages']= array();
//}
//
//function ajouteMessage($msg) {
//  $_SESSION['messages'][]= $msg;
//}
//
//// Retourne le tableau des messages
//// attention : cette opération va aussi effacer les messages.
//// l'idée est qu'un message n'est affiché qu'une seule fois :)
//function listeMessages() {
//  $resultat= $_SESSION['messages'];
//  $_SESSION['messages']= array();
//  return $resultat;
//}
//?>
