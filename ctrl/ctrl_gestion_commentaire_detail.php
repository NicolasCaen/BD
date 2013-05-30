<?php
	$select = "SELECT *  FROM commentaires 					
				WHERE com_id='".$id."'" ; 
 	$resultat = mysql_query($select,$db)  or die ('Erreur : '.mysql_error() );
 	$tab_images =array();
	$row = mysql_fetch_assoc($resultat);
?>