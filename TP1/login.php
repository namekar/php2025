<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;}
    $prenom="";
    $nom="";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $nom = test_input($_GET["fname"]);
        $prenom = test_input($_GET["lname"]);
    }
    
    

    echo "bonjour"." " .$nom." ".$prenom;
    if ($_GET["sexe"]=="homme") {
        echo " vous êtes un homme";
    } elseif ($_GET["sexe"]=="femme") {
        echo " vous êtes une femme";
    }
    else{
        echo " choisissez une sexe";
    }
    if (isset($_GET["etat"])) {
        if ($_GET["etat"] == "married") {
            echo " vous êtes marrié";
        }
    } else {
        echo " vous etes celibataire"; 
    }
?>
    
        





