<?php		
		//recuperation les images pour le slider
      	$select_images = 'SELECT  bd_image,bd_id,bd_titre FROM bandesdessinees ';
		$result_images = mysql_query($select_images,$db)  or die ('Erreur : '.mysql_error() );
		//comme la requete retourne plusieurs valeurs, on les met dans un tableau
		$tab_images =array();
		while($row = mysql_fetch_array($result_images)){
			$tab_images[]=$row;
		}  

?>	