 <?php 
	  $resultat=false; 
	 
	  $userfile=$_FILES["userfile"]["name"];  // nom du fichier source 
	  $userfile_size=$_FILES["userfile"]["size"];  // taille du fichier source 
	  $userfile_name=$_FILES["userfile"]["tmp_name"];  // fichier temporaire 
	  $MAX_FILE_SIZE=$_POST["MAX_FILE_SIZE"]; 

 ?>