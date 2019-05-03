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

    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Custom CSS -->
    <style>

    </style>

</head>
<body>

    <!-- CONTENT START -->
    <!-- <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">File name</th>
      <th scope="col">Size</th>
      <th scope="col">Last updated</th>
     </tr>
  </thead>
  <tbody >
  
    <tr>
      <th scope="row"> <a href='.$element'> $element </a></th>
      <td></td>
      <td></td>
   
    </tr>
    <tr>
      <th scope="row"><a href='$element'> $element </a></th>
      <td>xfhfh</td>
      <td>xfhxf</td>
     
    </tr>
    <tr>
      <th scope="row"><a href='$element'> $element </a></th>
      <td>xfhxf</td>
      <td>xfhxf</td>
      
    </tr>
  </tbody>
</table> -->
<div class="container">
        <div class="row">
            <div class="col-12">


    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileToUpload">
        <input type="submit">

    </form>

<?php
                if (isset ( $_GET['dir'] )){
                  $dir = $_GET['dir'];
              } else {
                  $dir = './';
              }


echo "<table class='table table-striped'>";
foreach (new DirectoryIterator($dir) as $fileInfo) {
        if ($fileInfo ->isDir()){
           echo "<tr><td><a href='?dir=".$dir."/". $fileInfo->getFilename() ."'>". $fileInfo->getFilename() ."</a></td>";
           echo "<td>" .  formatSizeUnits ( $fileInfo->getSize() ) . "</td>";
           echo "<td>" . date ("F d Y H:i:s.", $fileInfo->getMTime()) . "</td></tr>";

          }
        if ($fileInfo ->isFile()){
            echo "<tr><td><a href='".$dir."/".  $fileInfo->getFilename() ."'>". $fileInfo->getFilename() ."</a></td>";
            echo "<td>" .  formatSizeUnits ( $fileInfo->getSize() ) . "</td>";
            echo "<td>" . date ("F d Y H:i:s.", $fileInfo->getMTime()) . "</td></tr>";

        }
        
    }
    
    echo "</table>";

// foreach ($directory as $value) {
//   # code...
// }


// echo "</table>";


// $repertoire = scandir('./');

// foreach ($repertoire as $value) 
// {
//     echo 
//     "<tr>
//         <td><a href='$value'>" .$value . "</a></td>
//         <td>" . formatSizeUnits( filesize($value) ) . "</td>
//         <td>" . date("d F Y H:i:s", filemtime($value)) . "</td>
//     </tr>";
    
// }


// $repertoire = scandir('./');

// foreach ($repertoire as $element) {
//    echo "$element : " . formatSizeUnits( filesize($element )) . date("d/m/y à H:i" , filemtime($element)) . "<br>";
// }

function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}





?>

    <!-- CONTENT END -->

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- Custom JS -->
    <script src="js/main.js"></script>
</body>
</html>

