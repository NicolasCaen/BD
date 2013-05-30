<?php
// print_r($_POST);
	$select_ajout_bd ="INSERT INTO bandesdessinees (bd_titre,bd_resume, bd_image, bd_auteur_id) VALUES ('".$titre."', '".$resume."', '".$image."', '".$auteur."')";

	$resultat = mysql_query($select_ajout_bd ,$db)  or die ('Erreur : '.mysql_error() );
?>