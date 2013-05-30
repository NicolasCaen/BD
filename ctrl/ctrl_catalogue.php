<?php		
	//require_once('model/fonctions_model_catalogue.php');
	$total = countBDD('bd_id','bandesdessinees',$db);

	 //require('vues/view_catalogue.php'); // donne les données à la structure
    // Requête SQL qui ne prend que le nombre d'enregistrement nécessaire à l'affichage       
	$select = 'SELECT bd_titre, bd_resume,bd_id, bd_auteur_id,bd_image, auteurs.aut_nom as auteur FROM bandesdessinees LEFT JOIN auteurs ON bandesdessinees.bd_auteur_id=auteurs.aut_id  ORDER BY bd_titre ASC limit '.$limite.','.$nombre; 
  	$result = mysql_query($select,$db)  or die ('Erreur : '.mysql_error() );

  	// Si il y a des enregistrement on affiche
?>