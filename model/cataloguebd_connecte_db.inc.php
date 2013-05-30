<?php 
    function cataloguebd_connecte_db() 
        { 
          // Paramètre de connexion serveur 
          require "db.conf.php"; 
          
          $db = mysql_connect($host,$login,$password) or die("Connexion au serveur  
            impossible.<br /><a href=\"javascript:history.go(-1)\">BACK</a>"); 
          mysql_select_db($base); 
          return $db; 
        } 
?> 