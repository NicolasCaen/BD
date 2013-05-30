<?php
	$sTitre = 'DETAIL BD';
	$option = 	"";
	$msgConfirm= "DETAIL BD";



	$nom_image=$row['bd_image'];
	$id=$row['bd_id'];
	$nom_auteur=$row['auteur'];
	$titre_bd=$row['bd_titre'];


	$content = "<div class='vignettebig'>" 
	          . "<img src='images/".htmlentities($nom_image)."'>" 
	            ."<div class='vignettebig_droite'>"
	            		.'<b>Id:</b><br>'.htmlentities($id).'<br>'
	                    .'<b>Auteur:</b><br>'.htmlentities($nom_auteur).'<br>'
	                    .'<b>Titre:</b><br>'.htmlentities($titre_bd).'<br>'
	                    .'<b>Thèmes:</b><br>';
				    for ($i=0; $i<sizeof($tab_themes); $i++) {
				    	$content .=	htmlentities($tab_themes[$i][0]).' <br>';
				    } 
				    if(sizeof($tab_themes)==0){
				    	$content .= 'Aucun thèmes renseignés';
				    }

	if ((isset($_SESSION['utilisateur'])) && (($_SESSION['utilisateur']->signature)=="administrateur")) {
		//--------------------FORMULAIRE MODIFICATION----------------------------------------------
		$content .= "<form  action='#' method='post' accept-charset='utf-8' >"
					."<input type='hidden' name='choix' value='modifier_bd'/>"
					."<input type='hidden' name='id' value='".$id."'/>"
					."<input type='hidden' name='titre' value='".$titre_bd."'/>"  
					."<input type='submit' value='modifier' /> "
					."</form>"
					//--------------------FORMULAIRE DELETE----------------------------------------------
					."<form id='delete' action='index.php' method='post'>"
					."	<input type='hidden' name='choix' value='bd_delete'/>"
					."	<input type='hidden' name='id' value='".$id."'/>"
					."	<input type='submit' value='supprimer' /> "
					." </form> ";
	} 	





   $content .='<br>'		                    
          	.'</div>'                          
      		. '</div>'
      		.'<div class="resume"><b>Resumé:</b><br>'.htmlentities($row['bd_resume']).'</div><br>'; 


    $content .='<div class="affiche_commentaire"><b>Commentaire:</b><br>';
    		for ($i=0; $i<sizeof($tabrow_commentaire); $i++) {
				    	$content .=	'<hr><i>Posté le '.htmlentities($tabrow_commentaire[$i][2]).' Par '.htmlentities($tabrow_commentaire[$i][1]).' <br>'
				    				.'<p>'.htmlentities($tabrow_commentaire[$i][0]).'</p> <br>';
				    } 
				    if(sizeof($tabrow_commentaire)==0){
				    	$content .= 'Aucun commentaire actuellement';
				    }
	$content .='</div><br>'; 


	$content2 = "<h1>Laissez votre commentaire:</h1><br>"
				."	<form id='commentaire' action='index.php' method='post'>"
				."	<b>Pseudo: </b><input type='text' name='com_auteur' value='' id='pseudo'  /> <br>"
				."	<textarea  class='textarea' name ='com_txt' value='ecrivez votre commentaire'></textarea><br>"
				."	<input type='hidden' name='choix' value='commentaire_envoyer'/>"
				."	<input type='hidden' name='id' value='".$id."'/>"
				."	<input type='submit' value='envoyer' /> "
				.	"</form> ";
?>