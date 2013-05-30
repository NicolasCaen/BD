    <?php 

        $sTitre = "GESTION DES COMMENTAIRES";
        //$msgConfirm = 'Catalogue de vos Bandes dessinées';
        $msgConfirm= "GESTION DES COMMENTAIRES";
        $option = "";
		    $content ="";
        $content2 ="";
        $msgConfirm='';

        $option .= "<form id='option' action='#' method='post'>"
        ."  <input class='typetext' type='text' name='search' value= 'search'/>"
        ."    <p class='radio_option'><INPUT  type= 'radio' name='typerecherche' value='auteur' checked><i >Par auteur</i><br> "
        ."    <INPUT  type= 'radio' name='typerecherche' value='theme'><i> Par Thème</i></p>"
        ."  <p>recherche en construction</p>"
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
           $option .= '<li><a href ="'.$page.'?choix=gestion_commentaire&limite='.$limitePrecedente.'"> <<  </a></li>';     
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
            $option .= '<li class="num_a" ><a  href ="'.$page.'?choix=gestion_commentaire&limite='.$limiteB.'">'.$numeroPages.'</a></li>'."\n"; 
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
            $option .= '<li><a href ="'.$page.'?choix=gestion_commentaire&limite='.$limiteSuivante.'"> >>  </a></li>';
          } 
           $option .= '</ul></div>' ;        
   
          } 

          $content.="<h1> Liste des commentaires non validé:</h1>";

        //=========================================     
        // AJOUT des vigettes
        //========================================= 
        
        // Lecture et affichage des résultats sur 1colones, 1 résultat par ligne 
        while ($row = mysql_fetch_array($result)) 
        { 
          $id=htmlentities($row['com_id']);
          $content .= "<div class='vignette_commentaire' class='clear'>" 
          . "<img src='images/".htmlentities($row['bd_image'])."'>"
            ."<div class=vignette_gauche_bas_commentaire>"
           .'<b>Bd:</b>'.htmlentities($row['bd_titre']).'<br>'
           .'<b>Auteur:</b>'.htmlentities($row['aut_nom']).'</div><br>'  
              ."<div class='vignette_droite_commentaire'>"
                   ."<b>Commentaire:</b><hr><i>Posté le ".htmlentities($row['com_date']).' Par: ' .htmlentities($row['auteur_commentaire']).'</i> <br>'
                    .'<p>'.htmlentities($row['texte_commentaire']).'</p> <br>'
                    
                    .'<a href ="'.$page.'?choix=gestion_commentaire_detail&id='.$id.'">Modifier/supprimer</a>'
              . '</div>' 

          . '</div><br>'; 
        } 
        


    
      
       
      // On libère la mémoire 
      mysql_free_result($result); 



    ?> 
