<?php	

		//$total a modifier pour qu'il ne compte que les bd conceré
		$total = countBDD('bd_id','bandesdessinees',$db);

		//--------------------------------------------------------------------------------------------------------------
		//---------------------------------------RECHERCHE PAR AUTEUR---------------------------------------------------
		//--------------------------------------------------------------------------------------------------------------

		if(isset($_POST['typerecherche'])&&(($_POST['typerecherche'])=='auteur')){

			$select = "SELECT bd_titre, bd_resume,bd_id, bd_auteur_id,bd_image, auteurs.aut_nom as auteur 
			FROM bandesdessinees
			LEFT JOIN auteurs ON bandesdessinees.bd_auteur_id=auteurs.aut_id
			WHERE  auteurs.aut_nom like'".$auteur."%'" ; 
	      
     	}

     	//--------------------------------------------------------------------------------------------------------------
		//---------------------------------------RECHERCHE PAR THEME----------------------------------------------------
		//--------------------------------------------------------------------------------------------------------------

     	else{

	      	$select = "SELECT bd_titre, bd_resume,bd_id, bd_auteur_id,bd_image, auteurs.aut_nom as auteur ,th.th_intitule
						FROM bandesdessinees bd
						INNER JOIN auteurs ON bd.bd_auteur_id=auteurs.aut_id 
						INNER JOIN liens_bd_themes l  ON    bd.bd_id= l.lien_bd_id
						INNER JOIN themes th  ON    th.th_id= l.lien_themes_id 
						WHERE  th.th_intitule like'".$theme."%'";
			
		}

		$result = mysql_query($select,$db)  or die ('Erreur : '.mysql_error() );
?>