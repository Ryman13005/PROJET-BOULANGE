<?php 
  require_once "outil/outils.php"; 
  ob_start(); 
?>
  <div class="row">
    <?php foreach($tabordis as $ordi) { ?>
      <?php $i=0; ?>
      <div class="col">
        <div class="card p-1 m-1" style="width: 18rem;">
          <img height="300px" src="public/images/<?php echo $ordi['image']; ?>" class="card-img-top" alt="image">
          <div class="card-body">
            <h5 class="card-title"><?php echo sousChaineTaille($ordi['denomination'], 18); ?></h5>
            <p class="card-text"><?php echo sousChaineTaille($ordi['lien'],50); ?></p>
            <p class="card-text"><?php echo sousChaineTaille($ordi['prix'],50); ?></p>
            <a href="index.php?action=lire&id=<?php echo $ordi['id']; ?>" class="btn btn-primary">Afficher Ordinateur</a>
            <a href="index.php?action=addpanier&id=<?php echo $ordi['id']; ?>" class="btn btn-success">Ajouter Ordinateur Commande</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
<?php
$content = ob_get_clean();
$titre = "Catalogue d'Ordinateurs";
require "template.php";
?>  