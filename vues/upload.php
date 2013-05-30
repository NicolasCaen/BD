<?php 
  $resultat=false; 
 require_once "../model/fonction_upload.php3"; 
  $userfile=$_FILES["userfile"]["name"];  // nom du fichier source 
  $userfile_size=$_FILES["userfile"]["size"];  // taille du fichier source 
  $userfile_name=$_FILES["userfile"]["tmp_name"];  // fichier temporaire 
  $MAX_FILE_SIZE=$_POST["MAX_FILE_SIZE"]; 
   
  if (!$userfile_size && $userfile) 
  { 
    $size=$MAX_FILE_SIZE/1024; //1 Mo maxi 
    $size1=$size/1000; 
    print ("<html><head><title></title></head> 
        <body><center><br /> 
        <h1><font color='#FF0000'>Attention, l'envoi de fichier  
          de plus de $MAX_FILE_SIZE octets soit $size Ko ou 
          $size1 Mo n'est pas autorisé ! 
        </font></h1><br /> 
        <a href='upload.html'>Retour</a></center> 
        </body></html>"); 
    exit; 
  } 
  $destination="../images"; 
   
  // appel à la fonction is_uploaded_file() pour voir si le fichier est bien arrivé dans le fichier  
  // temporaire 
  if (is_uploaded_file($userfile_name)) 
  { 
    $resultat = upload($destination, $userfile, $userfile_name, $userfile_size); 
  } 
  else 
  { 
      echo "Fichier non sélectionné ou problème de transfert de fichier ".$userfile; 
  } 
   
  if ($resultat) 
  { 
    print ("<html><head><title></title></head> 
        <body><center><br /> 
        <h1><font color='#FF0000'>$resultat</font></h1><br /> 
        <a href='upload.html'>Retour</a></center> 
        </body></html>"); 
  } 
?>