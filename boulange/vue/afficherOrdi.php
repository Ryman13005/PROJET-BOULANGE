<?php 
ob_start(); 
?>
<br>
<div class="row">
    <div class="col-4">
        <img  style="width:80%; height:auto" src="public/images/<?= $ordi['image']; ?>">
    </div>
    <div class="col-8">
        <br>
        <h3>Mémoire: <?= $ordi['vive']; ?></h3>
        <br>
        <h3>Prix : <?= $ordi['prix']; ?> euros</h3>
        <br>
        <h3>Description :</h3> 
        <p><?= $ordi['lien']; ?></p>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = $ordi['denomination'];
require "template.php";
?>