<?php 
        $limiteSuivante = $limite + $nombre; 
        $limitePrecedente = $limite - $nombre; 

        $sTitre = 'CATALOGUE';
 //-------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------PANNEAU DE RECHERCHE---------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------------------------

        $option .= "<form id='option' action='index.php?choix=recherche' method='post'>"
                  ."  <input class='typetext' type='text' name='search' value= 'search'/>"
                  ."    <p class='radio_option'><INPUT  type= 'radio' name='typerecherche' value='auteur' checked><i >Par auteur</i><br> "
                  ."    <INPUT  type= 'radio' name='typerecherche' value='theme'><i>Par Thème</i></p>"
                  ."  <input type='submit' value='rechercher' /> "
                  . "</form> ";

       	
       	 //recupere le nom de la page
      	$path_parts = pathinfo($_SERVER["PHP_SELF"]); 
      	$page = $path_parts["basename"];

        
//-------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------decoupage en plusieurs pages------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------
        
     
      if($total > $nombre)  
      {   
          //recupere le nom de la page
          $path_parts = pathinfo($_SERVER["PHP_SELF"]); 
          $page = $path_parts["basename"];

           $option .= '<div id="content_top"><ul class="prev_next">' ;
        //=====================================================================================================     
        // AJOUT PRECEDENT <<   --------Uniquement si on est pas sur la page 1---------------------------------
        //=====================================================================================================           
          if($limite != 0) {      
            $option .= '<li><a href ="'.$page.'?choix=catalogue&limite='.$limitePrecedente.'"> <<  </a></li>';     
          }  
        //=====================================================================================================     
        // AJOUT DES LIENS vers les différentes pages----------------------------------------------------------
        //===================================================================================================== 
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
        //=======================================================================================================     
        // AJOUT SUIVANT >>     ---------Sauf si on est sur la dernière page-------------------------------------
        //======================================================================================================= 

          //affiche le bouton suivant si il reste des enregistrement
          if($limiteSuivante < $total) 
          { 
              $option .= '<li><a href ="'.$page.'?choix=catalogue&limite='.$limiteSuivante.'"> >>  </a></li>';
          } 
          $option .= '</ul></div>' ;        
   
        }
//---------------------------------------------FIN DU DECOUPAGE EN PAGES-----------------------------------------


//-------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------AJOUT DES VIGNETTES AU CONTENT----------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------
        
        // Lecture et affichage des résultats sur 1colones, 1 résultat par ligne 
        while ($row = mysql_fetch_array($result)) 
        { 
          $id=htmlentities($row['bd_id']);
          $content .= "<div class='vignette' class='clear'>" 
          . "<img src='images/".htmlentities($row['bd_image'])."'>" 
              ."<div class='vignette_droite'>"
                    .'<b>Auteur:</b><br>'.htmlentities($row['auteur']).'<br>'
                    .'<b>Titre:</b><br>'.htmlentities($row['bd_titre']).'<br>'
                    .'<a href ="'.$page.'?choix=detail&id='.$id.'"><b>Fiche</b></a>'
              . '</div>'                          
          . '</div><br>'; 
        }       
       
      // On libère la mémoire 
      mysql_free_result($result); 
?> 
