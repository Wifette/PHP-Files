<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="description de la page">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Other CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Custom CSS -->
    <style>


    </style>

</head>
<body>

    <!-- CONTENT START -->

    <div class="container">
        <div class="row">
            <div class="col-12">


       <?php     //merci le site du zero
//listage des fichiers dans le dosier upload 
//la fonction pourrait être modifiée en ajoutant une variable pour le dossier
//on pose la base du comptage
$nb_fichier = 0;
echo '<table>';
//ouverture du dossier
if($dossier = opendir('./'))
{
//lecture du contenu, en vérifiant qu'il n'y ait pas d'erreur
while(false !== ($fichier = readdir($dossier)))
{
//on exclue certains fichiers ici
if($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && $fichier != 'index.html')
{

$nb_fichier++; // On incrémente le compteur de 1
echo '<tr><td><a href="' . $fichier . '">' . $fichier . '</a></td><td><form action="file2.php" method="post"><input type="hidden" name="delete" value="' . $fichier . '"/><input type="submit" name="supprimer" value="supprimer" /></form></td>
</tr>';
}
 
}
echo '</table><br />';
echo 'Il y a <strong>' . $nb_fichier .'</strong> fichier(s) dans le dossier';
 
closedir($dossier);
 
}
 
else {
     echo 'Le dossier n\' a pas pu être ouvert';}
 
 //suppression d'un fichier
function sup() {
    $fichier = $_POST['delete'];
    
    unlink ('$fichier');
    echo ('$fichier');
    
        }
 
 ?>

<?php 

if(isset($_POST['supprimer'])){  
 // Le bouton supprimer a été cliqué  
 $fichier_a_supprimer=$_POST['liste_fichiers']; 
 if( file_exists ( "$fichier_a_supprimer")){ 
  $effacer=unlink("$fichier_a_supprimer"); 
  if($effacer){ 
   echo "Le fichier ".$fichier_a_supprimer." a bien été supprimé !"; 
  }
  else
  { 
  echo "Le fichier ".$fichier_a_supprimer." n'a pas pu être supprimé !"; 
  } 
  }
  else
  { 
  echo "Fichier ".$fichier_a_supprimer." non trouvé !!"; 
 } 
} 
?>
<form action='' method='post' name='Form'> 
<table width='100%' border='0' cellspacing='1' cellpadding='1'> 
<label>Fichier</label> :  <select name="liste_fichiers"> 
<?php 
$dirname = 'Vos-Fichiers-Uploder'; 
$dir = opendir('./'); 

$array_liste_fichiers=array(); 
while($file = readdir($dir)) { 
if($file != '.' && $file != '..' && !is_dir($dirname.$file)) 
{ 
$array_liste_fichiers[]=$file; 
} 
} 
closedir($dir); 

for($i=0;$i<sizeof($array_liste_fichiers);$i++){ 
echo '<option value="'.$array_liste_fichiers[$i].'">'.$array_liste_fichiers[$i].'</option>'; 
} 

?> 
<input type="submit" name="supprimer" value="Supprimer" >
</table> 

            </div>
        </div>
    </div>

    <!-- CONTENT END -->

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- Custom JS (parallax, etc) -->


    <!-- JS File -->
    <script src="js/main.js"></script>

    <!-- InPage JS -->
    <script>

    </script>

</body>
</html>