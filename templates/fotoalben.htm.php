<?php
$galleries = getGalleries($_SESSION["benutzerId"]);
?>
<div class="fotoalbum">
<?php
print_r($galleries);
foreach ($galleries as $gallery) {
//$firstImage = $db->getImages($galleries[$i]["gallery_id"], 1);
  ?>
  <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
          <a href="/php/index.php?id=showGallery" >
              <img src="../images/foto-top.png" alt="<?= $gallery["name"] ?>">
              <div class="caption">
                  <h3><?= $gallery["name"] ?></h3>
                  <?= $gallery["description"] ?>
              </div>
          </a>
          <a href=<?= "/php/index.php?id=deleteFotoalben&gallery_id=".$gallery["gallery_id"] ?> class="btn btn-danger pull-right delete">delete</a>
      </div>
  </div>
</div>
<?php
 }
  ?>
