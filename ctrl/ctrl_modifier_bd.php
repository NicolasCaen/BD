<?php	
		 //détail bdd 
    	$select_detail_bd  = 'SELECT bd_titre, bd_resume, bd_auteur_id,bd_image,bd_id, auteurs.aut_nom as auteur,bd_resume
    						 FROM bandesdessinees
							 LEFT JOIN auteurs ON bandesdessinees.bd_auteur_id=auteurs.aut_id
							 WHERE bd_id='.$id; 
      	$result_detail_bd = mysql_query($select_detail_bd ,$db)  or die ('Erreur : '.mysql_error() );
      	$detail = mysql_fetch_array($result_detail_bd);


		$select_auteurs = "SELECT *  FROM auteurs" ; 
      	$resultat_auteurs = mysql_query($select_auteurs,$db)  or die ('Erreur : '.mysql_error() );

      	$select_bd_all = "SELECT * FROM bandesdessinees" ; 
      	$resultat_bd_all = mysql_query($select_bd_all,$db)  or die ('Erreur : '.mysql_error() );	

     if(!$id==''){
      	$select_donne_bd = "SELECT * FROM bandesdessinees WHERE bd_id='".$id."'" ; 
      	$resultat_bd = mysql_query($select_donne_bd,$db)  or die ('Erreur : '.mysql_error() );	
      	     	
      	}	
?>