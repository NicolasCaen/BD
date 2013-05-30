<?php
	require_once("model/Utilisateur.php");
	require_once("constante/constantes.inc.php");

	session_start();
	// fonctions utilitaires
	require_once("model/general.php");
	require("model/fonctions_model.php");
	require_once('model/Messages.php');

	//print_r($_SESSION);
     
    //Connexion
	require "model/cataloguebd_connecte_db.inc.php"; 
  	// Appel de la fonction de connexion   
  	$db = cataloguebd_connecte_db();

//-------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------INITIALISATION DES VARIABLES------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------
	$login='';
	$password='';

	$sTitre = '';
	$script='';
	$menu='';
	$script='';
	$option ='';
	$content='';
	$content2='';
	$msgConfirm='';
	$choix = 'accueil';
	$msgConfirm ='';
	
	$com_txt='';
	$com_auteur='';
	
	$auteur='';
	$titre='';
	$image='';
	$resume='';

	$theme='';
	$id=0;
	$id_commentaire='';
	$visibility='';

	$vue= array();
	$vue['titrePage']= "pas de titre";

	$nombre=5; 
	
	//choix: adresse de page a charger
	if(isset($_GET['choix']))	$choix=$_GET['choix'];
	if(isset($_POST['choix']))	$choix=$_POST['choix'];
	
	if(isset($_POST['typerecherche'])&&(($_POST['typerecherche'])=='auteur'))	$auteur=$_POST['search'];		
	if(isset($_POST['typerecherche'])&&(($_POST['typerecherche'])=='theme'))	$theme=$_POST['search'];
	
	//if(isset($_GET['id_commentaire']))	$id_commentaire=$_GET['id_commentaire'];
	
	if(isset($_GET['limite'])) $limite=$_GET['limite']; 
	if(!isset($_GET['limite'])) $limite=0; 

	if(isset($_GET['id'])) $id=$_GET['id']; 
	if(isset($_POST['id']))	$id=$_POST['id'];
	
	
	
	if(isset($_POST['com_auteur']))	$com_auteur=clear_txt_bdd($_POST['com_auteur']);
	if(isset($_POST['com_txt']))  $com_txt=clear_txt_bdd($_POST['com_txt']);
	if(isset($_POST['visibility']))	$visibility=$_POST['visibility'];
	
	if(isset($_POST['auteur']))	$auteur=$_POST['auteur'];
	if(isset($_POST['titre']))	$titre=$_POST['titre'];
	if(isset($_POST['image']))	$image=$_POST['image'];
	if(isset($_POST['resume']))	$resume=$_POST['resume'];
	
	
	if(isset($_POST['login']))	$login=$_POST['login'];
	if(isset($_POST['password']))$password=$_POST['password'];
	


//------------------------------------------------------------------------------------------------------
	//CREATION DU MENU

//	if ((isset($_SESSION['utilisateur'])) && (($_SESSION['utilisateur']->signature)=="administrateur")){
//		$menu= require('vues/menu_admin.php');
//	}else{$menu=  require('vues/menu.php');};

//-----------------------------------------------------------------------------------------------------

//======================================================================================================
//								TRAITEMENT DES VUES	
//======================================================================================================
	switch ($choix) 
	{

		case 'accueil':
			require('model/ConnexionControle.php');
			$commande= new ConnexionControle();
			$commande->executer();
			require('ctrl/ctrl_accueil.php');
			require('vues/view_accueil.php');
			break;
			
		case 'connection':
			require('model/ConnexionControle.php');
			$commande= new ConnexionControle();
			$commande->executer();
			require('ctrl/ctrl_accueil.php');
			require('vues/view_accueil.php');
			break;	
			

		case "deconnection":
			require('model/ConnexionControle.php');
			$commande= new DeconnexionControle();
			$commande->executer();
			require('ctrl/ctrl_accueil.php');
			require('vues/view_accueil.php');
			break;			
				
		case "recherche":
			require('ctrl/ctrl_recherche.php');  
			 if($total) 
		 	{	require('vues/view_catalogue.php');
				break;	
			}
			else echo "Pas d'enregistrement dans cette table..."; 
			break;	

		case "catalogue":
			require('ctrl/ctrl_catalogue.php');
		  	 if($total) 
		 	{ 	require('vues/view_catalogue.php');
				break;	
			}
			else echo  "Pas d'enregistrement dans cette table..."; 
			break;	

		case "detail":
			require('ctrl/ctrl_detail.php');	
			require('vues/view_detail.php');
			break;	

		case "gestion_commentaire":
			require('ctrl/ctrl_gestion_commentaire.php');
		  	if($total) 
		 	{ 	require('vues/view_gestion_commentaire.php');
				break;
			}
			else echo 'Tout les commentaires sont visible';
			break;	 

		case "gestion_commentaire_detail":
			require('ctrl/ctrl_gestion_commentaire_detail.php');	
			require('vues/view_commentaire_detail.php');
			break;

		case "commentaire_update":
			require('ctrl/ctrl_update_commentaire.php');	
			require('vues/view_commentaire_update.php');
			break;

		case "commentaire_delete":
			require('ctrl/ctrl_delete_commentaire.php');	
			require('vues/view_commentaire_delete.php');
			break;

		case "commentaire_envoyer":	
			require('ctrl/ctrl_ajout_commentaire.php');
			require('vues/view_com_env.php');
			break;

		case "apropos":	
			require('vues/view_a_propos.php');
			break;

		case "ajout_auteur":
			require('ctrl/ctrl_ajout_auteur.php');	
			require('vues/view_validation_ajout_auteur.php');
			break;

		case "ajout_image":
			require_once ('model/fonction_upload.php3'); 
			require('ctrl/ctrl_ajout_image.php');	
			require('vues/view_validation_ajout_image.php');
			break;

		case "ajout_bd":
			require('ctrl/ctrl_ajout_bd.php');
			require('vues/view_ajout_bd.php');
			break;		

		case "ajout_bd_bdd":
			require('ctrl/ctrl_ajout_bd_bdd.php');
			require('vues/view_validation_ajout_bd_bdd.php');
			break;

		case "modifier_bd":
			require('ctrl/ctrl_modifier_bd.php');
			require('vues/view_modifier_bd.php');
			break;
	
		case "bd_delete":
			require('ctrl/ctrl_delete_bd.php');	
			require('vues/view_bd_delete.php');
			break;

		case "modifier_bd_bdd":
			require('ctrl/ctrl_modifier_bd_bdd.php');
			require('vues/view_validation_modification_bd_bdd.php');
			break;	

	}//fin du case
			require('vues/view_header.php');
			require('vues/view_footer.php');
	

?>
