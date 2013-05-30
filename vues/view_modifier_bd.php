<?php
	$sTitre = 'Modifier BD';

	$option='Modifier une bande dessinée';

	$content2='';

	$msgConfirm= '';

//======================================================================================================
//								choix BD	
//======================================================================================================
//
	//$content="<form  action='#' method='post' accept-charset='utf-8' >
	//				<input type='hidden' name='titre' value='ajout_bd_bdd'/>
	//				<h1>Titre:</h1>   
	//				<SELECT name='id'>";
//
	//				while($row = mysql_fetch_object($resultat_bd)){
	//					$content.="<OPTION value='".htmlentities($row -> bd_id)."'>".htmlentities($row ->bd_titre)."</OPTION>";
	//				}  
	//$content.=		"</SELECT>					
	//				<input type='submit' value='selection' /> 
//
	//			</form><hr>";
//======================================================================================================
//								MODIFIER BD	
//======================================================================================================

	$content.="<hr><form class='formulaire' action='index.php' method='post' accept-charset='utf-8' >
				<h1>Modifier une BD</h1>
					<input type='hidden' name='choix' value='modifier_bd_bdd'/>
					<input type='hidden' name='id' value='".$id."'/>
					<b class='formulaire_gauche'>Titre:</b> 
					<input class='formulaire_droit' type='text'  name='titre' value='".htmlentities($detail['bd_id'])."' /> <br class='clear'>
					<b class='formulaire_gauche'>Auteur:</b>   
					<SELECT class='formulaire_droit' name='auteur' >";

					while($row = mysql_fetch_object($resultat_auteurs)){
						$content.="<OPTION value='".htmlentities($row -> aut_id)."'>".htmlentities($row -> aut_nom)."</OPTION>";
					}  


	$content.="   	</SELECT>
					<br class='clear'> 
					<b class='formulaire_gauche'>Resume:</b><textArea class='formulaire_droit' name='resume'>".htmlentities($detail['bd_resume'])."</textArea><br class='clear'>
					<b class='formulaire_gauche'>Couverture:</b>
					<SELECT class='formulaire_droit' name='image' >";
					while($row = mysql_fetch_object($resultat_bd_all)){
						$content.="<OPTION value='".($row -> bd_image)."'>".htmlentities($row -> bd_image)."</OPTION>";
					}  
	$content.=		"</SELECT>
					<br class='clear'>
					<input class='formulaire_gauche' type='submit' value='modifier ' /> 

				</form>";
				//--------------------FORMULAIRE DELETE----------------------------------------------
	$content.=		"<form class='formulaire_droite' id='delete' action='index.php' method='post'>
						<input type='hidden' name='choix' value='bd_delete'/>
						<input type='hidden' name='id' value='".$id."'/>
						<input class='formulaire_droite' type='submit' value='supprimer' /> 
					 </form> ";
?>