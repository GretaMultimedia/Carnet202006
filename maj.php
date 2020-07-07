<?php
session_start();
 $id=filter_input(INPUT_POST,"id",FILTER_VALIDATE_INT);
 if (!$id){
     header("location: liste.php");
     exit();
 }
 
 include("includes/config.inc.php");
 
 try{
     
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
    
    
    $db=new mysqli(BDD_HOST,BDD_USER,BDD_PASS,BDD_DB);
    
    if($db->connect_errno){

        throw new Exception("Impossible de se connecter à la base. $db->connect_error");
    }
    
    $db->set_charset("utf8");
    
    $requete=$db->prepare("Update contacts set nom=?,prenom=?,adresse=?,cp=?,ville=?,tel=?,email=? where id=?");
    if(!$requete){
        echo "Impossible de préparer la requête";
    }
     
    $requete->bind_param("sssssssi",$nom,$prenom,$adresse,$cp,$ville,$tel,$email,$id);
     
    
    $requete->execute();
    if ($requete->errno){
        throw new Exception("erreur lors de l'execution de la requete");
    }
    
    $_SESSION['message'] = "<p class=\"succes\">Enregistré</p>";
     
 } catch (Exception $e) {
    $_SESSION['message'] = "<p class=\"erreur\">".$e->getMessage()."</p>";
    $_SESSION['posteddata'] = $_POST;
 }
 
 header("location: modifier.php?id=$id");



