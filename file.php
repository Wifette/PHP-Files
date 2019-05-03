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
<header class="container-fluid bg-dark">
  <div class="row">
    <div class="col-12">
      <h1 class="text-center py-5 text-white">Explorateur de fichier php</h1>
    </div>
  </div>
</header>

<?php
echo '<div class="container py-5"><table class="table table-striped"><form method="post" action="file.php" enctype="multipart/form-data">';
foreach (new DirectoryIterator('./') as $fileInfo) {
  //if ($fileInfo ->isDir()){
    //echo "<tr><td><a href='?dir=". $fileInfo->getFilename() ."'>". $fileInfo->getFilename() ."</a></td></tr>";
  //}
  if ($fileInfo ->isFile()){
   
    echo '<tr><td><a href="'. $fileInfo->getFilename() .'">'. $fileInfo->getFilename() .'</a></td><td><input type="submit" id="'.$fileInfo->getFilename().'" class="btn btn-secondary" value="Supprimer"></td></tr>';
}
}
echo '</form></table></div>'; 

?>

<form class="container" method="post" action="file.php" enctype="multipart/form-data">

<div class="row">

<div class="col-12">
<?php
//unlink ("index.html");
if(isset($_FILES['fichier']))
{ 
  $dossier = './';
  $fichier = basename($_FILES['fichier']['name']);
  if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
  {
    echo '<p class=\"text-center\">Upload effectué avec succès ! </p>';
  }
  else //Sinon (la fonction renvoie FALSE).
  {
    echo '<p class=\"text-center\">Echec de l\'upload ! </p>';
  }
}
?>
<div class="input-group mb-3">

<div class="input-group-prepend">

<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
<span class="input-group-text" id="up">Upload</span>

</div>

<div class="custom-file">

<input type="file" class="custom-file-input" name="fichier" id="fichier" aria-describedby="inputGroupFileAddon01">
<label class="custom-file-label" for="fichier">Choisir un fichier</label>

</div>
<div>
<input type="submit" class="btn btn-outline-secondary" name="submit" value="Envoyer" />
</div> 

</div> 
</div> 
</div> 
</form>















<a href="index.php" class="btn btn-dark">Retour</a>



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

$("input[type=file]").change(function (e){$(this).next('.custom-file-label').text(e.target.files[0].name);})

</script>

</body>
</html>