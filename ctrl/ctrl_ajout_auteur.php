<?php	
	$select_ajout_auteur ="INSERT INTO auteurs (aut_nom)
								VALUES ('".$auteur."')";
	$resultat = mysql_query($select_ajout_auteur ,$db)  or die ('Erreur : '.mysql_error() );
?>