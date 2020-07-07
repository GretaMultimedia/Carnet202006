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




try {

//Se connecter à la base de donnéer
    $db = new mysqli(BDD_HOST, BDD_USER, BDD_PASS, BDD_DB);
    if (!$db) {
        throw new Exception("Impossible de se connecrter à la base.");
    }
    $db->set_charset("utf8");


//envoyer la requete " select * from contacts where id=$id "

    $requete = "select nom,prenom from contacts where id='$id'";

    $res = $db->query($requete);

    if (!$res) {
        throw new Exception("Erreur lors de l'execution de la requete");
    }

//? verifier le nombre d'enregistrment

    if ($res->num_rows < 1) {
        throw new Exception("Le contact a déjà été supprimer");
    }



//recuperer les informations sur le contact

    $contact = $res->fetch_object();

  //-----
    
    $reqdel="delete from contacts where id=$id";
    
    $db->query($reqdel);
    if ($db->errno){
        throw new Exception("Erreur lors de la supression de $contact->nom $contact->prenom ");
        
    }
    
    
    
    
    $_SESSION['message'] = "<p class=\"succes\">$contact->nom $contact->prenom a bien été supprimé</p>";
  
} catch (Exception $e) {

    $_SESSION['message'] = "<p class=\"erreur\">".$e->getMessage()."</p>";
    $_SESSION['posteddata'] = $_POST;
}

header("location: liste.php");