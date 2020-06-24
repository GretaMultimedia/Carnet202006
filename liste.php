<?php

include "includes/config.inc.php";
include "includes/presentation.lib.php";

//connexion à la base
entete("Contacts");
try {
    $db = new mysqli(BDD_HOST, BDD_USER, BDD_PASS, BDD_DB);

    if (mysqli_connect_errno()) {

        throw new Exception("Une erreur est survenue lors de la récupération de la liste de contacts");
    }
    
    $requete="select id,nom,prenom from contacts order by nom,prenom";
    
    $res=$db->query($requete);
    
    if (!$res){    
        throw new Exception("Une erreur est survenue lors de la récupération de la liste de contacts");       
    }
    
    
    echo "<table>";
    while ($contact=$res->fetch_object()){
     
        echo "
        <tr>
            <td>$contact->nom  $contact->prenom</td>
            <td>
                <a href=\"detail.php?id=$contact->id\">Détail</a> - 
                <a href=\"editer.php?id=$contact->id\">Editer</a> - 
                <a href=\"supprimer.php?id=$contact->id\">Supprimer</a>
            </td>
        </tr>";
        
    }
    echo "</table>";
    
    
} 
catch (Exception $e) {

    echo "<p class=\"erreur\">" . $e->getMessage() . "</p>";
}




pied();