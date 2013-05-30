<?php	
	$select_delete_commentaire = "DELETE FROM commentaires WHERE com_id='".$id."'"; 
	$resultat = mysql_query($select_delete_commentaire ,$db)  or die ('Erreur : '.mysql_error() );
?>