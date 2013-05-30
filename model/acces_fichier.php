<?php
  function getAllProducts()
  {
    $tableaufinal=array(array());                   

    $fp = fopen(MON_FICHIER, "r");  
    $contenu_du_fichier = fgets ($fp);

    $newligne=explode(';',$contenu_du_fichier);//tableau a une dim avec le contenu nom prenom tel de chaque contact separer par des |


    $taille=sizeof($newligne);

    for ($i=0; $i<$taille-1; $i++)//pour chaque ligne du tableau on redecompose  le string en tableau pour separer le nom prenom et tel
    { 

        if (strpos($newligne[$i], '|')>0) {   //il ne doit pas prendre en compte les lignes (ou il n'y a pas de | cad ex ;;;)
            $tabstring2=explode('|',$newligne[$i]);

            
            $tableaufinal[$i][0] = $tabstring2[0];
            $tableaufinal[$i][1] = $tabstring2[1];
            $tableaufinal[$i][2] = $tabstring2[2];

            
        }

    }
    return $tableaufinal;
  }
?>
