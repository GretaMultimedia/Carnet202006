<?php
session_start();
$id=filter_input(INPUT_GET, "id",FILTER_VALIDATE_INT);


if($id===false){  
    header("location: liste.php");
    exit();   
}


include("includes/presentation.lib.php");
include("includes/config.inc.php");

entete();

try{
    
   // var_dump($_SESSION);
    
    if (!isset($_SESSION["posteddata"])) {

        $database=new mysqli(BDD_HOST,BDD_USER,BDD_PASS,BDD_DB);
    
        if($database->connect_errno > 0 ){
            throw new Exception("Impossible de se connecter à la base de donnée");
        }

        $requete="select * from contacts where id=$id";

        $res=$database->query($requete);
        if ($database->errno > 0 ){
            throw new Exception("Un erreur est survenue lors de l'execution de la requete.($database->error)");
        }


        if ($res->num_rows < 1){
            throw new Exception("Le contact n'existe pas ou plus");
        }

    
        $contact=$res->fetch_object();
    }
    else{
       
        $contact=new stdClass();
        $contact->id=$id;
        $contact->nom=$_SESSION["posteddata"]["nom"];
        $contact->prenom=$_SESSION["posteddata"]["prenom"];
        $contact->adresse=$_SESSION["posteddata"]["adresse"];
        $contact->cp=$_SESSION["posteddata"]["cp"];
        $contact->ville=$_SESSION["posteddata"]["ville"];
        $contact->tel=$_SESSION["posteddata"]["tel"];
        $contact->email=$_SESSION["posteddata"]["email"];
        
        unset($_SESSION["posteddata"]);
        
        
    }
    
?>    
    
        <form action="maj.php" method="post">
            <input type="hidden" name="id" value="<?=$id?>">
            <p><label for="chpNom">Nom</label><input type="text" name="nom" value="<?=$contact->nom?>" id="chpNom"></p>
            <p><label for="chpPrenom">Prénom</label><input type="text" name="prenom" value="<?=$contact->prenom?>" id="chpPrenom"></p>
            <p><label for="chpAdresse">Adresse</label><input type="text" name="adresse" value="<?=$contact->adresse?>" id="chpAdresse"></p>
            <p><label for="chCP">Code Postal</label><input type="text" name="cp" value="<?=$contact->cp?>" id="chCP"></p>
            <p><label for="chpVille">Ville</label><input type="text" name="ville" value="<?=$contact->ville?>" id="chpVille"></p>
            <p><label for="chpTel">Téléphone</label><input type="text" name="tel" value="<?=$contact->tel?>" id="chpTel"></p>
            <p><label for="chpEmail">E-mail</label><input type="text" name="email" value="<?=$contact->email?>" id="chpEmail"></p>
            <p><button> Enregistrer </button></p>
        </form>



    
<?php   

} catch (Exception $e) {

     echo "<p class=\"erreur\">" . $e->getMessage() . "</p>";
}

pied();