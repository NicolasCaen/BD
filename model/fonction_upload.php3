<?php 
  /* Titre : Upload d'un fichier vers un serveur 
  $destination :   Répertoire de destination sur le serveur 
  $userfile :     chemin et nom du fichier source 
  $userfile_name :  nom du fichier de destination 
  $userfile_size :  taille du fichier source */ 
   
  function upload($destination,$userfile,$userfile_name,$userfile_size) { 
    if ($userfile != '' && $userfile_size != 0) 
    { 
      // Test pour savoir si le ficheir existe déjà 
      if (!file_exists("$destination/$userfile")) 
      { 
        if (!file_exists($destination)) 
        {  // Si le répertoire n'existe pas, on le crée 
          mkdir($destination,0755); 
        } 
        // Appel de la fonction de transfert du fichier temporaire 
        // vers le répertoire de destination (fichier source -> fichier destination) 
        if(!move_uploaded_file($userfile_name, "$destination/$userfile")) 
        {  // La copie ne peut pas se faire 
          $resultat="Problème de transfert pour le fichier"; 
        } 
        else 
        {  // La copie s'est bien exécutée 
          $resultat="Fichier $userfile bien enregistré;"; 
        } 
      } 
      else 
      {  // Le fichier existe déjà dans le répertoire de destination 
        $resultat="Le fichier $userfile que vous voulez transférer ". 
          "existe déjà dans votre répertoire"; 
      } 
    } 
    else 
    { 
      $resultat="Aucun fichier sélectionné !"; 
    } 
     
    return $resultat; 
  } 
   
?>