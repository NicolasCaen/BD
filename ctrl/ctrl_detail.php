<?php		 //détail bdd 
    	$select_detail_bd  = 'SELECT bd_titre, bd_resume, bd_auteur_id,bd_image,bd_id, auteurs.aut_nom as auteur,bd_id,bd_resume
    						 FROM bandesdessinees
							 LEFT JOIN auteurs ON bandesdessinees.bd_auteur_id=auteurs.aut_id
							 WHERE bd_id='.$id; 
      	$result_detail_bd = mysql_query($select_detail_bd ,$db)  or die ('Erreur : '.mysql_error() );
      	$row = mysql_fetch_array($result_detail_bd);
      	//recuperation des themes bdd
      	$select_themes ='SELECT th_intitule
						FROM themes t
						INNER JOIN liens_bd_themes l ON    t.th_id= l.lien_themes_id 
						INNER JOIN bandesdessinees bd ON    bd.bd_id= l.lien_bd_id
						WHERE bd_id='.$id;
		$result_themes = mysql_query($select_themes,$db)  or die ('Erreur : '.mysql_error() );
		//comme la requete retourn plusieur valeur, on les met dans un tableau
		$tab_themes =array();
		while($row2 = mysql_fetch_array($result_themes)){
			$tab_themes[]=$row2;
		}
		//recuperation des commentaires visible
		$select_commentaire = "SELECT com_texte,com_auteur,com_date
							 FROM commentaires
							  WHERE visibility='o'and com_bd_id=".$id;
		$result_commentaire = mysql_query($select_commentaire,$db)  or die ('Erreur : '.mysql_error() );
		
		//comme la requete retourn plusieur valeur, on les met dans un tableau
		$tabrow_commentaire =array();
		while($row3 = mysql_fetch_array($result_commentaire)){
			$tabrow_commentaire[]=$row3;			
		}
?>