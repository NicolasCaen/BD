<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title><?php echo $sTitre; ?></title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
	</head>

	<body>
		<div id="wrapper">
			<?php require("vues/menu.php"); ?>
			<h1><?php echo $sTitrePage; ?></h1>
			<?php echo $content; ?>
			<h1><?php echo $msgConfirm; ?></h1>
			<center><a href="index.php?choix=accueil">accueil</a></center>
		</div>
		<div id='haut'>
			
		<div>
	</body>

</html>