<?php
 print_r("titre:".$titre."',bd_resume='".$resume."', bd_image='".$image."', bd_auteur_id='".$auteur."' WHERE bd_id='".$id."'");
	$select_modifier_bd ="UPDATE bandesdessinees SET bd_titre='".$titre."',bd_resume='".$resume."', bd_image='".$image."', bd_auteur_id='".$auteur."' WHERE bd_id='".$id."'";

	$resultat = mysql_query($select_modifier_bd ,$db)  or die ('Erreur : '.mysql_error() );
?>