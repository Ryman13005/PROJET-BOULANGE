<?php 
ob_start(); 
?>
<!-- form method="POST" action="index.php?page=ordis&action=valid-modifier">
        <label for="titre">Titre : </label><br>
        <input type="text" id="titre" name="titre" value="<?= $ordi['titre'] ?>"><br>
    
        <label for="nbPages">Nombre de pages : </label><br>
        <input type="number" id="nbPages" name="nbPages" value="<?= $ordi['nbPages'] ?>"><br>
   
        <label for="descr">Description : </label><br>
        <input type="text" id="descr" name="descr" value="<?= $ordi['denomination'] ?>"><br>
        <input type="hidden" name="id" value="<?= $ordi['id'] ?>">
        <input type="hidden" name="image" value="<?= $ordi['image'] ?>">
    
    <button type="submit">Valider</button>
</form -->
<div class="container">
    <form method="POST" action="index.php?page=ordis&action=valid-modifier" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label" for="titre">Titre : </label>
        <input class="form-control" type="text" id="titre" name="titre" value="<?= $ordi['titre'] ?>">
      </div>
      <div class="mb-3">
        <label class="form-label" for="nbPages">Prix : </label>
        <input class="form-control" type="number" step=0.01 id="nbPages" name="prix" value="<?= $ordi['prix'] ?>">
      </div>
      <div class="mb-3">
        <label class="form-label" for="nbPages">Nombre de pages : </label>
        <input class="form-control" type="number" id="nbPages" name="nbPages" value="<?= $ordi['nbPages'] ?>">
      </div>
      <div class="mb-3">
        <label class="form-label" for="descr">Denomination : </label>
        <input class="form-control" type="text" id="descr" name="descr" value="<?= $ordi['denomination'] ?>">
      </div>
      <input type="hidden" name="id" value="<?= $ordi['id'] ?>">
      <input type="hidden" name="image" value="<?= $ordi['image'] ?>">
      <input class="btn btn-primary" type="submit" value="modifier" name="form_ajouter"/> 
</form>
<?php
$content = ob_get_clean();
$titre = "Modifier le ordi";
require "template.php";
?>