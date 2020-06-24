<?php

//verifier que l'on a recu un id par la methode GET
//sinon renvoyer vers liste.php et exit();

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($id === false) {
    header("location: liste.php");
    exit();
}

//inclure les fichiers nécessaires
include "includes/config.inc.php";
include "includes/presentation.lib.php";

entete();


try {

//Se connecter à la base de donnéer
    $db = new mysqli(BDD_HOST, BDD_USER, BDD_PASS, BDD_DB);
    if (!$db) {
        throw new Exception("Impossible de se connecrter à la base.");
    }
    $db->set_charset("utf8");


//envoyer la requete " select * from contacts where id=$id "

    $requete = "select * from contacts where id='$id'";

    $res = $db->query($requete);

    if (!$res) {
        throw new Exception("Erreur lors de l'execution de la requete");
    }

//? verifier le nombre d'enregistrment

    if ($res->num_rows < 1) {
        throw new Exception("Le contact n'existe pas");
    }



//recuperer les informations sur le contact

    $contact = $res->fetch_object();

// afficher les infos 


    echo "
<h2>$contact->nom $contact->prenom</h2>
<p class=\"adresse\">$contact->adresse <br>$contact->cp $contact->ville</p>
";
    if (!empty($contact->tel)) {
        echo "
    <p class=\"tel\"><b>tel : </b>$contact->tel</p>
    ";
    }

    if (!empty($contact->email)) {
        echo "
    <p class=\"email\"><b>E-mail : </b>$contact->email</p>
    ";
    }
} catch (Exception $e) {

    echo "<p class=\"erreur\">" . $e->getMessage() . "</p>";
}


pied();
