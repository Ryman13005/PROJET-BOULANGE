<?php 
ob_start(); 
?>
<div class="container">
    <form method="POST" action="index.php?action=valid-creer" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label" for="denomination">Denomination : </label>
        <input class="form-control" type="text" id="titre" name="titre">
      </div>
      <div class="mb-3">
        <label class="form-label" for="nbPages">Prix : </label>
        <input class="form-control" type="number" step=0.01 id="nbPages" name="prix">
      </div>
      <div class="mb-3">
        <label class="form-label" for="nbPages">Mémoire : </label>
        <input class="form-control" type="number" id="nbPages" name="nbPages">
      </div>
      <div class="mb-3">
        <label class="form-label" for="descr">Description : </label>
        <input class="form-control" type="text" id="descr" name="descr">
      </div>
      <div class="mb-3">
        <label class="form-label" for="image">Image : </label>
        <input class="form-control" type="file" id="image" name="image">
      </div>
      <input class="btn btn-primary" type="submit" value="Valider le formulaire" name="form_ajouter"/> 
</form>
<?php
$content = ob_get_clean();
$titre = "Ajout d'un ordinateur";
require "template.php";
?>