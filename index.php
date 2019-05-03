<!DOCTYPE html>
<html lang="fr">
<head>
<!-- Required meta tags -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="description de la page">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<title>Les bases du php</title>

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
<div class="container bg-dark text-white">
<div class="row">
<div class="col-12">

<?php
echo "Hello world ! <br>";
//idem que
echo('Hello world ! <br>');

//Déclaration de variable on utilise le $
$mavariable = "soleil";
echo $mavariable ."<br>";
//Concaténation on utilise le .
echo "ma variable :". $mavariable ."<br>";

//Boucle for
for ( $i = 0; $i< 10; $i++){
    echo "valeur de i : " .$i ."<br>";
}

//Boucle while
$x = 4;
while ($x <5){
    $x++;
    echo $x ."<br>";
}

//Condition
$z = 19;
if($z== 18){
    echo "la valeur = 18 <br>";
    
}else {
    echo "la valeur n'égale pas 18 <br>";
}

//idem que
$z = 19;
if($z=== 18){
    echo "la valeur = 18 <br>";
}else {
    echo "la valeur n'égale pas 18 <br>";
}

//Double guillement on échape pas l'apostrophe
$hiver = "c'est l'hiver";
$hiver = 'c\'est l\'éte';

//Entre guillemets pas besoin de concaténer
$saison = "automne";
echo "il fait beau cette $saison <br>";
echo 'il fait beau cette $saison <br>';

//Afficher les valeurs d'un tableau
$tableau = ["A","B","C","D"];
foreach($tableau as $value){
    echo 'valeur : ' . $value .'<br>';
}
//idem que 
$note = ["A","B","C","D"];
foreach($note as $etudiant){
    echo 'valeur : ' . $etudiant .'<br>';
}

//Intégrer du html 
echo '<h1>Un titre</h1>';

//Afficher un tableau
$somme=1;
$maxTr = $maxTd = 10;
echo "<table border=1>";
for ($i=0; $i<$maxTr; $i++){
    echo "<tr>";
    for($j=0; $j<$maxTd; $j++){
        
        echo "<td>" . $somme++ . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

?>


//method='post' ne passe pas par l'url
//method= 'get' passe par l'url
<form action="" method="POST">
<input type="text" name="nom" placeholder="Nom">
<input type="text" name="prenom" placeholder="Prénom">
<input type="submit" name="submit">
</form>
<form action="" method="POST">
<input type="text" name="dir" placeholder="Répertoire">
<input type="submit" name="submit">
</form>
<?php

//Une fonction pour éviter les messages d'erreurs dus aux champs vide au chargement de la page
// If (isset($_POST['champ']))
if (isset($_POST['nom'])){
    $nom = $_POST['nom'];
echo 'Nom : ' .$nom;
echo 'Prénom : ' .$_POST['prenom'];
}else{
    echo 'Le champ Nom est vide';
}
//Si $_POST['dir'] n'est pas vide, afficher les fichiers sinon message
if (isset($_POST['dir'])) {
$dir = $_POST['dir'];
$scandirResult = scandir($dir);
foreach ($scandirResult as $result){
    echo $result.'<br>';}
}else{
    echo 'Le champ répertoire est vide';
}
//Pour avoir information sur une variable
$nom=$_POST['nom'];
var_dump($nom);
echo "<table class='table table-striped'>";
foreach (new DirectoryIterator('./') as $fileInfo) {
        if ($fileInfo ->isDir()){
           echo "<tr><td><a href='?dir=". $fileInfo->getFilename() ."'>". $fileInfo->getFilename() ."</a></td></tr>";
        }
        if ($fileInfo ->isFile()){
            echo "<tr><td><a href='". $fileInfo->getFilename() ."'>". $fileInfo->getFilename() ."</a></td></tr>";
        }
    }
echo "</table>";
?>
<a href="file.php" class="btn btn-dark">fichier file</a>
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