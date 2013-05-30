<?php
		 //require_once('model/fonctions_model_catalogue.php');
		$total = countBDD('bd_id','bandesdessinees',$db);
		//require('vues/view_catalogue.php'); // donne les données à la structure
	    // Requête SQL qui ne prend que le nombre d'enregistrement nécessaire à l'affichage       
    	$select = "SELECT bd.bd_titre,a.aut_nom,bd.bd_image,bd.bd_id,com_date,com_auteur as auteur_commentaire,com_texte as texte_commentaire,com_id, visibility 
    				FROM commentaires c
					INNER JOIN bandesdessinees bd ON c.com_bd_id=bd.bd_id
					INNER JOIN auteurs a ON a.aut_id=bd.bd_auteur_id
					WHERE visibility='n' ORDER BY c.com_date limit ".$limite.','.$nombre
					 ; 
      	$result = mysql_query($select,$db)  or die ('Erreur : '.mysql_error() );

      	// Si il y a des enregistrement on affiche


?>