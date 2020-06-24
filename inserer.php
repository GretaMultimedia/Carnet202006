<?php

session_start(); //demarrage de la session pour la gestion des messages 
include 'includes/config.inc.php'; //inclusion des identifiants de bdd



try {
    

    /* TODO
     * formater nom, prénom, tel
     * faire les vérification nécessaires
     */
    
    
    
    $nom = filter_input(INPUT_POST, "nom"); // TODO : formater
    $prenom = filter_input(INPUT_POST, "prenom"); // TODO : formater
    $adresse = filter_input(INPUT_POST, "adresse");
    $cp = filter_input(INPUT_POST, "cp");
    $ville = filter_input(INPUT_POST, "ville"); // TODO : formater
    $tel = filter_input(INPUT_POST, "tel"); // TODO : formater
    $email = filter_input(INPUT_POST, "email"); // TODO :  filter validate et revoyer exception si KO

    if (empty($nom) && empty($prenom)){
        throw new Exception("Vous devez spécifier au moins un nom ou un prénom.");
    }
    
    $db = @new mysqli(BDD_HOST, BDD_USER, BDD_PASS, BDD_DB);
    if ($db->connect_errno > 0) {
        throw new Exception("Un erreur est survenue lors de la connexion à la base de donnée.");
    }

    @$db->set_charset("utf8");

    
    
    $requete = $db->prepare("insert into contacts values ('',?,?,?,?,?,?,?)");
    if (!$requete){
       throw new Exception("Un erreur est survenue lors de l'execution de la requete."); 
    }
    $requete->bind_param('sssssss', $nom, $prenom, $adresse, $cp, $ville, $tel, $email);
   
    if (! $requete->execute()){
        
        throw new Exception("Un erreur est survenue lors de l'execution de la requete.");
        
    }
    

    
    

    $_SESSION['message'] = "<p class=\"succes\">$nom $prenom a bien été ajouté à votre carnet d'adresses.</p>";
    
    
} 
catch (Exception $e) {
    
    $_SESSION['message'] = "<p class=\"erreur\">".$e->getMessage()."</p>";
    $_SESSION['posteddata'] = $_POST;
   
    
}

header("location: ajouter.php");
exit();
    