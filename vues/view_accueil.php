<?php
	$sTitre = 'ACCUEIL';


	$script =	"<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'></script>"
				."<script type='text/javascript' src='s3Slider.js'></script>"
				."<script type='text/javascript'>"
				."    $(document).ready(function() {"
				."        $('#slider').s3Slider({"
				."            timeOut: 3000"
				."        });"
				."    });"
				."</script>";
	
//-------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------FORMULAIRE    DE   CONNECTION-----------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------
	$option = 	"<form id='option' action='index.php?choix=connection' method='post'>"
				."	<input class='typetext' type='text' name='login' value='login' required/><br>"
				."	<input class='typetext' type='password' name='password' value='password'/><br>"
				."	<input type='submit' value='log' /> "
				.	"</form> ";


	$content = '<div id="slider">'
				.'	<ul id="sliderContent">';
	
//-------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------AFFICHAGE DU STATUS DE CONNECTION------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------
	if (isset($_SESSION['utilisateur'])) {
     $msgConfirm= "<i>connecté comme ". htmlspecialchars($_SESSION['utilisateur']->login)."</i>";
    } else {
     $msgConfirm= "<i>non connecté</i>";
    }

//-------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------AFFICHAGE DU SLIDER--------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------
	for ($i=0; $i<sizeof($tab_images); $i++) 
	{
    	$content .=	"<li class='sliderImage'>"
		            ."    <img src='images/".htmlentities($tab_images[$i][0])."' alt='".$i."'' />"
		            ."    <span class='bottom'><strong>".htmlentities($tab_images[$i][2])."</strong></span>"
		            ."</li>";
    } 
    if(sizeof($tab_images)==0)  	$content .= '<h1>AUCUNES IMAGES</h1>';
    


	$content .= '<div class="clear sliderImage"></div>'
	  			.'     </ul>'
	   			." </div><IMG id='tv' SRC='css/images/tv_simpson.png' ALT='tv' >";
//------------------------------------------------------------------------------------------------------------------------------
?>