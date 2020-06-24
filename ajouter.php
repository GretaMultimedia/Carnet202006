<?php
session_start();
include("includes/presentation.lib.php");
entete("Ajouter un contact");

$nom=$prenom=$adresse=$cp=$ville=$tel=$email='';

if (!empty($_SESSION["posteddata"])){
    
    $nom=$_SESSION["posteddata"]['nom'];
    $prenom=$_SESSION["posteddata"]['prenom'];
    $adresse=$_SESSION["posteddata"]['adresse'];
    $cp=$_SESSION["posteddata"]['cp'];
    $ville=$_SESSION["posteddata"]['ville'];
    $tel=$_SESSION["posteddata"]['tel'];
    $email=$_SESSION["posteddata"]['email'];
  
    
    unset($_SESSION["posteddata"]);
}   


?>

        <form action="inserer.php" method="post">
            <p><label for="chpNom">Nom</label><input type="text" name="nom" value="<?=$nom?>" id="chpNom"></p>
            <p><label for="chpPrenom">Prénom</label><input type="text" name="prenom" value="<?=$prenom?>" id="chpPrenom"></p>
            <p><label for="chpAdresse">Adresse</label><input type="text" name="adresse" value="<?=$adresse?>" id="chpAdresse"></p>
            <p><label for="chCP">Code Postal</label><input type="text" name="cp" value="<?=$cp?>" id="chCP"></p>
            <p><label for="chpVille">Ville</label><input type="text" name="ville" value="<?=$ville?>" id="chpVille"></p>
            <p><label for="chpTel">Téléphone</label><input type="text" name="tel" value="<?=$tel?>" id="chpTel"></p>
            <p><label for="chpEmail">E-mail</label><input type="text" name="email" value="<?=$email?>" id="chpEmail"></p>
            <p><button> Ajouter </button></p>
        </form>

<?php
pied();