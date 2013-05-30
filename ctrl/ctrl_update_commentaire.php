<?php	

	$select_update_commentaire = "UPDATE commentaires 
									set com_texte='".$com_txt."', com_auteur='".$com_auteur."', visibility='".$visibility."' WHERE com_id='".$id."'"; 
	$resultat = mysql_query($select_update_commentaire ,$db)  or die ('Erreur : '.mysql_error() );
?>