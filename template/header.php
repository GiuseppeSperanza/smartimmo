<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      <?php //
    		if ( strpos($_SERVER['REQUEST_URI'], 'index') || $_SERVER['REQUEST_URI'] == '/' )  echo "Home"; 
				if ( strpos($_SERVER['REQUEST_URI'], 'login'))  echo "Login"; 
        if ( strpos($_SERVER['REQUEST_URI'], 'dettaglio'))  echo "Dettaglio"; 
        if ($_SERVER['REQUEST_URI'] == "/nuovo/annuncio")  echo "Nuovo Annuncio"; 
      ?>	
    </title>

    <link href="/assets/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/starter-template.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <?php
     if( isset($_GET['success'])){
      echo '
       <script>
        function showToast() {
            var x = document.getElementById("snackbar");
            x.className = "show";

            setTimeout(function(){ 
              x.className = x.className.replace("show", "");
              }, 3000);
        }
      </script>';
    }
    ?>
  </head>



    <body <?php  if( isset($_GET['success'])){ 
            echo 'onload="showToast()"';}  ?>
     >

    <?php
     if( isset($_GET['success'])){
          $msg = strtoupper(str_replace('-', ' ', $_GET['success']));
          echo '<div id="snackbar"> '. $msg .'</div>';
        }
    ?>

     


