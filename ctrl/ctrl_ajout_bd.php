<?php	
		$select_auteurs = "SELECT *  FROM auteurs" ; 
      	$resultat_auteurs = mysql_query($select_auteurs,$db)  or die ('Erreur : '.mysql_error() );

      	$select_bd = "SELECT * FROM bandesdessinees" ; 
      	$resultat_bd = mysql_query($select_bd,$db)  or die ('Erreur : '.mysql_error() );	
?>