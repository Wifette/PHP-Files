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

            <form class="container" method="post" action="wetransfert.php" enctype="multipart/form-data">

<div class="row">

        <div class="col-md-6 pt-5 mb-3 mx-auto">
               
        <div class="input-group mb-3">

                <div class="input-group-prepend">

                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                <span class="input-group-text" id="up">Upload</span>

                </div>

                <div class="custom-file">

                    <input type="file" class="custom-file-input" name="fichier" id="fichier" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="fichier">Choisir un fichier à uploader...</label>
          
                </div>
                <?php

                
                //echo '<div class="col-md-6 text-center font-weight-bold mx-auto p-2 rounded alert-secondary w-100 mb-3">'.$_FILES['fichier']['name'].'</div>';
             


                //Upload
                //if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                //{
                    //echo '<div class="col-md-6 text-center font-weight-bold mx-auto p-2 rounded alert-secondary w-100 mb-3">Upload effectué avec succés !</div>';
                //echo $path_fichier;
             
                //$_FILES['fichier'] = NULL;}
               // else //Sinon (la fonction renvoie FALSE).
               // {
                    //echo '<div class="col-md-6 text-center font-weight-bold mx-auto p-2 rounded alert-danger w-100 mb-3">Upload effectué avec succés !</div>';
                    //$_FILES['fichier'] = NULL;} } 
                    
                
                ?>
                
        </div><!-- fermeture input group file-->
        
       </div><!-- fermeture col file-->
       
       </div><!-- fermeture row file-->
        <div class="row">
                <?php 
                
                if(isset($_FILES['fichier'])) //Si variable 'fichier' n'existe pas
                { 
                $dossier = './';
                $fichier = basename($_FILES['fichier']['name']); //Nom du fichier
                $path_fichier = $_FILES['fichier']['tmp_name']; //fichier temporaire
               
                }
echo '<div class="container py-5">
<table class="table table-striped">
<form method="post" action="file.php" enctype="multipart/form-data">';
foreach ($coordonnees as $element) {
//if ($fileInfo ->isDir()){
//echo "<tr><td><a href='?dir=". $fileInfo->getFilename() ."'>". $fileInfo->getFilename() ."</a></td></tr>";
//}
if ($fileInfo ->isFile()){

echo '<tr><td><a href="'. $fileInfo->getFilename() .'">'. $fileInfo->getFilename() .'</a></td><td><input type="submit" id="'.$fileInfo->getFilename().'" class="btn btn-secondary" value="Supprimer"></td></tr>';
}
}
echo '</form></table></div>'; 
                echo '<div class="col-md-6 font-weight-bold mx-auto p-2 rounded alert-secondary w-100 mb-3">'.$_FILES['fichier']['name'].'<a href="delete.php" class="btn btn-secondary"><i class="fas fa-trash-alt"></i></a>

                </div>';
                
                ?>
        </div>




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