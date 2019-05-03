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


            <?php

$taillemax = 1048576; // taille max d'un fichier (multiple de 1024)
$filetype = '/php|txt|html/i'; // types de fichiers acceptés, séparés par |
$nametype = '/\.php|\.txt|\.html/i'; // extensions correspondantes
$rep = 'upload/'; // répertoire de destination
$maxfichier = 3; // nombre maximal de fichiers
/* fin des modifications */

// fichier courant (URI absolue) : formulaire récursif
$PHP_SELF = basename($_SERVER['PHP_SELF']);

if($_POST) {
	$msg = array(); // message
	$fichier = $_FILES['lefichier']; // simplication du tableau $_FILES
	for($i=0; $i<count($fichier['name']); $i++) {
		// nom du fichier original = nom par défaut
		$nom = $fichier['name'][$i];
		// test existence fichier
		if(!strlen($nom)) {
			$msg[] = "Aucun fichier !";
			continue;
		}

		// si un nouveau nom est renseigné (avec extension correcte)
		if(preg_match($nametype, $_POST['lenom'][$i]))
			$nom = $_POST['lenom'][$i];
		// répertoire de destination
		$destination = $rep.$nom;
		// test erreur (PHP 4.3)
		if($fichier['error'][$i]) {
			switch($fichier['error'][$i]) {
				// dépassement de upload_max_filesize dans php.ini
				case UPLOAD_ERR_INI_SIZE:
				  $msg[] = "Fichier trop volumineux !"; break;
				// dépassement de MAX_FILE_SIZE dans le formulaire
				case UPLOAD_ERR_FORM_SIZE:
				  $msg[] = "Fichier trop volumineux (supérieur à ".(INT)($taillemax/1024)." Mo)"; break;
				// autres erreurs
				default:
				  $msg[] = "Impossible d'uploader le fichier !";
			}
	
		// test taille fichier
		elseif($fichier['size'][$i] > $taillemax){
			$msg[] = "Fichier $nom trop volumineux : ".$fichier['size'][$i];
		// test type fichier
		}elseif(!preg_match($filetype, $fichier['type'][$i])){
			$msg[] = "Fichier $nom de type incorrect : ".$fichier['type'][$i];
		// test upload sur serveur (rep. temporaire)
		
		}elseif(!move_uploaded_file($fichier['tmp_name'][$i])){
			$msg[] = "Impossible d'uploader $nom";
		// test transfert du serveur au répertoire
		}elseif(!move_uploaded_file($fichier['tmp_name'][$i], $destination)){
			$msg[] = "Problème de transfert avec $nom";
		}else{
		move_uploaded_file($fichier['tmp_name'][$i]) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                        
                            
			$msg[] = "Fichier <b>$nom</b> téléchargé avec succès !";
	
	// affichage confirmation
	for($i=0; $i<=count($msg); $i++)
		echo '<p>'.$msg[$i].'</p>';

// 1 fichier par défaut (ou supérieur à $maxfichier)
$upload = (isset($_REQUEST['upload']) && $_REQUEST['upload'] <= $maxfichier) ? $_REQUEST['upload'] : 1;

// choix du nombre $upload de fichier(s)
echo "<form action='$PHP_SELF' method='post'>\n";
echo "Quantité <select name='upload' onChange=\"window.open(this.options[this.selectedIndex].value,'_self')\">\n";
for($i=1; $i<=$maxfichier; $i++) {
	echo "<option value='$PHP_SELF?upload=$i'";
	if($i == $upload) echo " selected";
	echo ">$i\n";
}
echo "</select>\n";
//echo "<input name='upload' value='$upload' size='3'>\n";
//echo "<input type='submit' value='Modifier'></form>\n";

// le formulaire
echo "<form action='$PHP_SELF' enctype='multipart/form-data' method='post'>\n";
// boucle selon nombre de fichiers $upload
for($i=1; $i<=$upload; $i++) {
	echo "<p>Nom $i <input name='lenom[]'>\n";
	echo "<input type='hidden' name='MAX_FILE_SIZE' value='$taillemax'>";
	echo "Fichier <input type='file' name='lefichier[]'></p>\n";
}
?>
<input type='submit' value='Envoyer'>
</form>



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


