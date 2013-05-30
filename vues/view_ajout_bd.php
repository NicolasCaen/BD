<?php
	$sTitre = 'Ajout BD';

	$option='';

	$content2='';

	$msgConfirm= 'Ajouter une bande dessinée';
//======================================================================================================
//								UPLOAD IMAGE	
//======================================================================================================
	$content ="<form class='formulaire' enctype='multipart/form-data' action='index.php' method='post'> 
				  <h1>Ajouter une image</h1>
						<input type='hidden' name='choix' value='ajout_image'/>
				      <h3>Fichier à envoyer (taille limitée à 1 mo) : </h3> 
				 
				      <input type='hidden' name='MAX_FILE_SIZE' value='1024000' /> 
				      <input type='file' name='userfile' />
				     
				
				  <input type='submit' value='envoyer' /> 
				  
				</form>" ;
//======================================================================================================
//								AJOUT AUTEUR
//======================================================================================================
	$content .="<hr><form id='auteur_formulaire' class='formulaire' action='index.php' method='post'>
					<input type='hidden' name='choix' value='ajout_auteur'/>
					<h1>Ajouter un Auteur</h1> 
						<b class='formulaire_gauche'>Auteur:</b>
						 <input  class='formulaire_droit' type='text'  name='auteur'  />
						 <br class='clear'>			  
				  	
				  <input class='formulaire_gauche' type='submit' value='ajouter' /> 
				  <br class='clear'>	
				</form>" ;
//======================================================================================================
//								AJOUT BD	
//======================================================================================================

	$content.="<hr><form class='formulaire' action='index.php' method='post' accept-charset='utf-8' >
				<h1>Ajouter une BD</h1>
					<input type='hidden' name='choix' value='ajout_bd_bdd'/>
					<b class='formulaire_gauche'>Titre:</b> 
					<input class='formulaire_droit' type='text'  name='titre'  /> <br class='clear'>
					<b class='formulaire_gauche'>Auteur:</b>   
					<SELECT class='formulaire_droit' name='auteur' >";

					while($row = mysql_fetch_object($resultat_auteurs)){
						$content.="<OPTION value='".htmlentities($row -> aut_id)."'>".htmlentities($row -> aut_nom)."</OPTION>";
					}  


	$content.="   	</SELECT>
					<br class='clear'> 
					<b class='formulaire_gauche'>Resume:</b><textArea class='formulaire_droit' name='resume'> </textArea><br class='clear'>
					<b class='formulaire_gauche'>Couverture:</b>
					<SELECT class='formulaire_droit' name='image' >";
					while($row = mysql_fetch_object($resultat_bd)){
						$content.="<OPTION value='".($row -> bd_image)."'>".htmlentities($row -> bd_image)."</OPTION>";
					}  
	$content.=		"</SELECT>
					<br class='clear'>
					<input class='formulaire_gauche' type='submit' value='ajouter ' /> 

				</form>";
?>