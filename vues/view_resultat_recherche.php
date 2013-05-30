    <?php 
        $sTitre = 'CATALOGUE';
        //$msgConfirm = 'Catalogue de vos Bandes dessinées';
        $msgConfirm= "Bienvenue  sur la BDthèque";
        $option = "";
		    $content ="";
        $content2 ="";
        $msgConfirm='';

        $option .=  "<form id='option' action='#' method='post'>"
        ."  <input class='typetext' type='text' name='search' value= 'search'/>"
        ."  <input type='submit' value='rechercher' /> "
        . "</form> ";

       	
       	 //recupere le nom de la page
      	$path_parts = pathinfo($_SERVER["PHP_SELF"]); 
      	$page = $path_parts["basename"];
        $limiteSuivante = $limite + $nombre; 
    	   $limitePrecedente = $limite - $nombre; 
        
        //=========================================     
        // si le nombre d'enregistrement à afficher  
        // est plus grand que le nombre d'element 
        // voulu par page ($nombre) alors on ajoute 
        // les liens vers les resultats suivant
        //========================================= 
        
     
      if($total > $nombre)  
      {   
          //recupere le nom de la page
          $path_parts = pathinfo($_SERVER["PHP_SELF"]); 
          $page = $path_parts["basename"];

           $option .= '<div id="content_top"><ul class="prev_next">' ;
         //=========================================     
        // AJOUT de précédent
        //=========================================           
          if($limite != 0) 
          {           
           $option .= '<li><a href ="'.$page.'?choix=catalogue&limite='.$limitePrecedente.'"> <<  </a></li>';     
          }  
        //=========================================     
        // AJOUT des liens
        //========================================= 
          $nbpages=ceil($total/$nombre); 
          $numeroPages = 1; 
          $compteurPages = 1; 
          $limiteB  = 0; 
          while($numeroPages <= $nbpages)  
          { 
            $option .= '<li class="num_a" ><a  href ="'.$page.'?choix=catalogue&limite='.$limiteB.'">'.$numeroPages.'</a></li>'."\n"; 
            $limiteB = $limiteB + $nombre; 
            $numeroPages = $numeroPages + 1; 
            $compteurPages = $compteurPages + 1; 
              if($compteurPages == 10)  
              { 
               $compteurPages = 1; 
              } 
            } 
         //========================================     
        // AJOUT de suivant
        //========================================= 

          //affiche le bouton suivant si il reste des enregistrement
          if($limiteSuivante < $total) 
          { 
            $option .= '<li><a href ="'.$page.'?choix=catalogue&limite='.$limiteSuivante.'"> >>  </a></li>';
          } 
           $option .= '</ul></div>' ;        
   
          } 



        //=========================================     
        // AJOUT des vigettes
        //========================================= 
        
        // Lecture et affichage des résultats sur 2 colones, 1 résultat par ligne 
        while ($row = mysql_fetch_array($result)) 
        { 
          $id=htmlentities($row['bd_id']);
          $content .= "<div class='vignette' class='clear'>" 
          . "<img src='images/".htmlentities($row['bd_image'])."'>" 
              ."<div class='vignette_droite'>"
                    .'<b>Auteur:</b><br>'.htmlentities($row['auteur']).'<br>'
                    .'<b>Titre:</b><br>'.htmlentities($row['bd_titre'])
                    .'<a href ="'.$page.'?choix=detail&id='.$id.'">detail</a>'
              . '</div>'                          
          . '</div><br>'; 
        } 
        


    
      
       
      // On libère la mémoire 
      mysql_free_result($result); 



    ?> 
