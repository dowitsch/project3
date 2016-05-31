  <?php
$galleries = getGalleries($_SESSION["benutzerId"]);
?>
<div class="fotoalbum">
<?php
foreach ($galleries as $gallery) {
// $firstImage = $db->getImages($galleries[$i]["gallery_id"], 1
  ?>
  <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
          <a href=<?="index.php?id=showGallery&gallery_id=".$gallery["gallery_id"]?> >
              <?php
              $images = getImages($gallery['gallery_id']);
              if(!empty($images)){
                $image = $images[0];
                echo "<img src=data:".$image['file_type'].";base64,".$image['thumbnail'] ." alt=".$image["name"] . " />";
              }else{
                echo "No images found";
              }
              ?>
              <div class="caption">
                  <h3><?= $gallery["name"] ?></h3>
                  <?= $gallery["description"] ?>
              </div>
          </a>
          <a href=<?= "index.php?id=deleteFotoalben&gallery_id=".$gallery["gallery_id"] ?> class="btn btn-danger pull-right delete">delete</a>
      </div>
  </div>
</div>
<?php
 }
  ?>
