<?php 


  $sTitre = 'AJOUT IMAGE';
  $option =   "";
  $msgConfirm= "<div id='confirm'><span >Image ajouté</span></div>";

  

  $content = "<p><h1>Félicitation,l'image a été ajouté</h1></p>"       
        ."<img src='./css/images/ahah.png' alt='bulle'>";
  $content2 = ''; 




   
  if (!$userfile_size && $userfile) 
  { 
    $size=$MAX_FILE_SIZE/1024; //1 Mo maxi 
    $size1=$size/1000; 
 
  $content .="<p>Attention, l'envoi de fichier de plus de $MAX_FILE_SIZE octets soit $size Ko ou  $size1 Mo n'est pas autorisé !</p> 
        <a href='index.php?choix=ajout_bd'>Retour</a>"; 
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
      $msgConfirm= "<div id='confirm'><span >Image non ajouté</span></div>";
      $content ="<h1>Fichier non sélectionné ou problème de transfert de fichier ".$userfile."</h1>"; 
  } 
   
  if ($resultat) 
  { 
    $content ="<h1>".$resultat."<h1>";
  } 
?>