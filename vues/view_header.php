<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=8" />
		<title><?php echo $sTitre; ?></title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
		<script type="text/javascript" src="js/menu.js"></script>
		<script type="text/javascript" src="js/PIE.js"></script>
		<?php echo $script; ?>
	</head>

	<body>
		<div id="wrapper">

			<div id="menu-wrapper">
				<div id="menu">
					<ul>
						<li id='left'></li>								
						<li><a href="index.php?choix=accueil">Accueil</a></li>
						<li><a href="index.php?choix=catalogue">Catalogue</a></li>
						<li></li>
						<?php 
							if ((isset($_SESSION['utilisateur'])) && (($_SESSION['utilisateur']->signature)=="administrateur"))  include("vues/menu_option.php");			
						?>
						<li><a href="index.php?choix=apropos">A Propos</a></li>
						<li id='right'></li>					
					</ul>
				</div>
			</div>


			<div id='haut'>
				<div id='hautdroite'>
					<h1><?php echo $option; ?></h1>
					<h1><?php echo $msgConfirm; ?></h1>
				</div>
			</div>
			
		</div>
		<div id='page'>
			<?php echo $content; ?>
			
