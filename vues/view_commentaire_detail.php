<?php
	$sTitre = 'Gestion de commentaire';
	$option = 	"";
	$msgConfirm= "Gestion de Commentaire";






	$content ="";

				$content .= 
				"<form id='commentaire' action='index.php' method='post'>"
				."	<b>Pseudo: </b><input type='text' name='com_auteur' value='".htmlentities($row['com_auteur'])."' id='pseudo'  /><br>"
				."	<textarea  class='textarea' name ='com_txt' value='ecrivez votre commentaire'>".htmlentities($row['com_texte'])."</textarea><br>"
				."	<input type='hidden' name='choix' value='commentaire_update'/>"
				."	<input type='hidden' name='id' value='".htmlentities($row['com_id'])."'/>"
				."    <p ><INPUT  type= 'radio' name='visibility' value='o' ><i >Visible</i><br> "
        		."    <INPUT  type= 'radio' name='visibility' value='n' checked><i> non visible</i></p>"
				."	<input type='submit' value='envoyer' /> "
				.	"</form> "
				."<form id='delete' action='index.php' method='post'>"
				."	<input type='hidden' name='choix' value='commentaire_delete'/>"
				."	<input type='hidden' name='id' value='".htmlentities($row['com_id'])."'/>"
				."	<input type='submit' value='supprimer' /> "
				." </form> ";

   

	$content2 = "";
?>