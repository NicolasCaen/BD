<?php	
	$select_delete_commentaire = "DELETE FROM commentaires WHERE com_bd_id='".$id."'"; 
	$resultat = mysql_query($select_delete_commentaire ,$db)  or die ('Erreur : '.mysql_error() );

	$select_delete_bd = "DELETE FROM bandesdessinees WHERE bd_id='".$id."'"; 
	$resultat = mysql_query($select_delete_bd ,$db)  or die ('Erreur : '.mysql_error() );
?>