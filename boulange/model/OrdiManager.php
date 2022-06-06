<?php
require_once "connexion.php";

    function lireOrdis(){
        $pdo = getPdo();
        $sql = "SELECT * FROM ordis";
        $req = $pdo->prepare($sql);
        $req->execute();
        $ordis = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $ordis;
    }

    function lireOrdisById($id){
        $pdo = getPdo();
        $req = "SELECT * FROM ordis WHERE id=:id";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":id",$id,PDO::PARAM_STR);
        $cpt = $stmt->execute();
        $ordis = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();  
        return $ordis;
    }

    function ajouterOrdiBd($denomination, $prix , $processeur, $ecran, $vive, $image, $lien){
        $pdo = getPdo();
        $req = "
        INSERT INTO ordis (denomination, prix , processeur, ecran, vive, image, lien)
        values (:denomination, :prix, :processeur, :ecran, :vive , :image, :lien)";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":denomination",$denomination,PDO::PARAM_STR);
        $stmt->bindValue(":prix",$prix,PDO::PARAM_STR);
        $stmt->bindValue(":processeur",$processeur,PDO::PARAM_INT);
        $stmt->bindValue(":ecran", $ecran,PDO::PARAM_STR);
        $stmt->bindValue(":vive",$vive,PDO::PARAM_STR);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $stmt->bindValue(":lien",$lien,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            echo "ordi insérer id=".$pdo->lastInsertId()."<br>";
        }        
    }

    function supprimerordiBD($id){
        $pdo = getPdo();
        $req = "Delete from ordis where id = :idordi";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":idordi",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            echo "ordi supprimer id=".$id."<br>";
        }
    }

    function supprimerTousordisBD(){
        $pdo = getPdo();
        $req = "Delete from ordis";
        $stmt = $pdo->prepare($req);
        $nbr = $stmt->execute();
        return $nbr;
    }

    function modificationordiBD($denomination, $prix , $processeur, $ecran, $vive, $image, $lien){
        $pdo = getPdo();
        $req = "
        update ordis 
        set titre = :titre, prix = :prix, nbPages = :nbPages, image = :image, description = :description
        where id = :id";
        $stmt = $pdo->prepare($req);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->bindValue(":titre",$titre,PDO::PARAM_STR);
        $stmt->bindValue(":prix",$prix,PDO::PARAM_STR);
        $stmt->bindValue(":nbPages",$nbPages,PDO::PARAM_INT);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $stmt->bindValue(":description",$description,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            echo "ordi modifier id=".$id."<br>";
        }
    }
