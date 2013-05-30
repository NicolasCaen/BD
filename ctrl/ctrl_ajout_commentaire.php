<?php
	
	//$select_ajout_commentaire = "INSERT INTO commentaires(com_bd_id ,com_auteur, com_texte, visibility) VALUES( '".$id."','".$com_auteur."', '".$com_txt."','n')"; 
	
	echo htmlentities($id);
	$select_ajout_commentaire ="INSERT INTO commentaires (com_bd_id ,	com_auteur ,com_texte ,	visibility)
								VALUES ('".$id."','".$com_auteur."','".$com_txt."' ,'n')";
	$resultat = mysql_query($select_ajout_commentaire ,$db)  or die ('Erreur : '.mysql_error() );
?>