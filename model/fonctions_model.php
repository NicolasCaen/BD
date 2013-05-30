

    <?php 
      function verifLimite($limite,$total,$nombre)  
        { 
            // je verifie si limite est un nombre. 
            if(is_numeric($limite))  
            { 
                // si $limite est entre 0 et $total, $limite est ok 
                // sinon $limite n'est pas valide. 
                if(($limite >=0) && ($limite <= $total) && (($limite%$nombre)==0))  
                { 
                    // j'assigne 1 à $valide si $limite est entre 0 et $max 
                    $valide = 1; 
                }     
                else  
                { 
                    // sinon j'assigne 0 à $valide 
                    $valide = 0; 
                } 
            } 
            else  
            { 
                // si $limite n'est pas numérique j'assigne 0 à $valide 
              $valide = 0; 
            } 
            return $valide; // je renvois $valide 
        } 

      function countBDD($champ,$table,$connexion)  
         
        { 
          $select = "SELECT count($champ) FROM $table"; 
          $result = mysql_query($select,$connexion) or die ('Erreur : '.mysql_error() );    
          $row = mysql_fetch_row($result); 
          return $row[0]; //$total est le nombre d'enregistrement dans la table
        } 

	  function format_titre($string)
		{
          return ucfirst(strtolower($string));
        }
				
	function clear_txt_bdd($string){ 
		return str_replace("'","\'",$string);
    }
	function clear_txt_affichage($string){ 
		return str_replace("\'","'",$string);
    }
	?> 