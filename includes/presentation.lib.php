<?php
if (!isset($_SESSION)){
    session_start();
}
function entete($titre=null){
    echo '<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Carnet d\'adresse</title>
        <link rel="stylesheet" type="text/css" href="theme/main.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <header>
            <h1>Carnet</h1>
        </header>
        <nav>
            <ul>
                <li><a href="liste.php">Liste</a></li>
                <li><a href="ajouter.php">Ajouter</a></li>
                <li>
                    <form action="liste.php" method="post">
                        <input type="text" placeholder="Rechercher" name="rechercher">
                        <button>Go</button>
                    </form>
                </li>             
            </ul>
        </nav>
        <main>';
   if (!is_null($titre)){ 
        echo "<h2>$titre</h2>";
   }
   
   if (!empty($_SESSION["message"])){
       echo $_SESSION["message"];
       unset($_SESSION["message"]);
   }
   
  
}
function pied(){
    echo '</main>
        <footer>
            &copy;Copyright Moi 2020
        </footer>
    </body>
</html>';
}
