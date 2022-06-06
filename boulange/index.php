<?php
    session_start();
    require_once "controleur/controleur.php";
    require_once "outil/outils.php";
        $id_session = session_id();
        echo  $id_session;



    if(empty($_GET['action'])){
        //afficherOrdis();
        afficherAccueil();
    }
    elseif(isset($_GET['action'])) {
        if($_GET['action']=="tab"){
            afficherOrdis();
        }
        elseif($_GET['action'] == 'suppr'){ //OK
            supprimerordi($_GET['id']);
        }
        else if($_GET['action'] == 'lire'){ //OK
            afficherordi($_GET['id']);
        }
        elseif($_GET['action'] == 'creer'){ //OK
            creerordi();
        }
        elseif($_GET['action'] == 'valid-creer'){ //OK
            creerValidationordi();
        }
        elseif($_GET['action']=="card"){  //OK
            afficherCardordis();
        }
        elseif($_GET['action'] == 'modifier'){ //OK
            modifierordi($_GET['id']);
        }
        elseif($_GET['action'] == 'valid-modifier'){//OK
            echo "Modifier validation";
            modifierValidationordi();
        }
        elseif($_GET['action'] == 'addpanier'){ //OK
            echo "Ajouter panier id=".$_GET['id'];
            ajouterordiPanier($_GET['id']);
        }
        elseif($_GET['action'] == 'panier'){ //OK
            echo "Voir commande";
            if(isset($_SESSION['ordis']))
                afficherCommande();
            else afficherCommande();
        }
        elseif($_GET['action']=="supprpanier"){ 
            echo "Supprimer commande";
            supprimerCommande();
        }
        elseif($_GET['action'] == 'addpanier'){ //OK
            echo "Ajouter panier id=".$_GET['id'];
            ajouerterordiPanier($_GET['id']);
        }
        else {
            echo "La page n'existe pas";
        } 
    }
    else {
        echo "La page n'existe pas";
    } 
    
?>