<?php
include("includes/presentation.lib.php");
entete("Ajouter un contact");
?>

        <form action="inserer.php" method="post">
            <p><label for="chpNom">Nom</label><input type="text" name="nom" id="chpNom"></p>
            <p><label for="chpPrenom">Prénom</label><input type="text" name="prenom" id="chpPrenom"></p>
            <p><label for="chpAdresse">Adresse</label><input type="text" name="adresse" id="chpAdresse"></p>
            <p><label for="chCP">Code Postal</label><input type="text" name="cp" id="chCP"></p>
            <p><label for="chpVille">Ville</label><input type="text" name="ville" id="chpVille"></p>
            <p><label for="chpTel">Téléphone</label><input type="text" name="tel" id="chpTel"></p>
            <p><label for="chpEmail">E-mail</label><input type="text" name="email" id="chpEmail"></p>
            <p><button> Ajouter </button></p>
        </form>

<?php
pied();