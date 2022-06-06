<?php
require_once "./outil/outils.php";
require_once "./model/OrdiManager.php";

function afficherAccueil(){
    require "vue/accueil.php";

}

function afficherOrdis(){
    $tabOrdis=lireOrdis();
    require "vue/afficherordis.php";
}
function afficherOrdi($id){
    $ordi=lireOrdisById($id);
    require "vue/afficherordi.php";
}
function supprimerordi($id){
    supprimerordiBD($id);
    $ordi=lireOrdisById($id);
    header("Location: index.php?action=tab");
}
function creerordi(){
    require "vue/formulaireordi.php";
}
function creerValidationordi(){
    $file = $_FILES['image'];
    $repertoire = "public/images/";
    $nomImageAjoute = ajouterImage($file,$repertoire);
    ajouterOrdiBd($_POST['denomination'],$_POST['prix'],$_POST['vive'],$nomImageAjoute,$_POST['lien']);
    header("Location: index.php?action=tab");
}
function afficherCardordis(){
    $tabordis=lireordis();
    require "vue/cardOrdi.php";
}
function modifierordi($id){
    echo "Modifier ordi id=".$id."<br>";
    $ordi=lireOrdisById($id);
    require "vue/modifierordi.php";
}
function modifiervalidationordi(){
    afficherTableau($_POST,"POST");
    echo "Modifier VALIDATION ordi id<br>";
    modificationordiBD($_POST['denomination'],$_POST['id'],$_POST['prix'], $_POST['processeur'],$_POST['ecran'],$_POST['vive']);
    header("Location: index.php?action=tab");
}
function ajouterordiPanier($id){
    echo "controleur ajouterordiPanier id=".$id;
    if(!isset($_SESSION['ordis'])){
        $_SESSION['ordis'] = array();
        echo $id." commande";
    }
    if(in_array($id, $_SESSION['ordis'])){
        echo $id." est déjà commander<br>";
    }
    else {
        $_SESSION['ordis'][]=$id;
    }
    afficherTableau($_SESSION['ordis'],"SESSION['ordis']");
    header("Location: index.php?action=card");
}
function afficherCommande(){
    foreach($_SESSION['ordis'] as $id){
        $ordis[]=lireOrdisById($id);
    }
    if(isset($ordis)){
        if(count($ordis) > 0)
            require "vue/afficherCommande.php";
    }
    else //echo "La commande est vide<br>";
        header("Location: index.php?action=card");
}
function supprimerCommande(){
    $_SESSION['ordis'] = array();
    afficherTableau($_SESSION,"controleur - supprimerCommand _SESSION");
    header("Location: index.php?action=card");
}
?>

