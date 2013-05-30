<?php

  /**
   * Gestion des messages destin�s � l'utilisateur.  Leur texte est
   * stock� en session afin de survivre �ventuellement �
   * l'utilisation d'une redirection.
   * 
   * Pour pouvoir changer le syst�me si nous le d�sirons, nous avons
   * donc ajout� cette petite couche d'abstrchoix.
   * 
   * (de plus, en �crivant directement 
   *    $_SESSION['messages'][]= "mon message";
   * on court le risque, par exemple, de mal orthographier "messages".
   * dans ce cas, il ne se passe rien, pas de message d'erreur.
   * l'utilisation d'ajouteMessage nous prot�ge de ce probl�me.
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
//// attention : cette op�ration va aussi effacer les messages.
//// l'id�e est qu'un message n'est affich� qu'une seule fois :)
//function listeMessages() {
//  $resultat= $_SESSION['messages'];
//  $_SESSION['messages']= array();
//  return $resultat;
//}
//?>
