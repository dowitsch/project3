<a href= <?="/php/index.php?id=pictureForm&gallery_id=".$_GET['gallery_id']?> class="btn btn-default pull-left">upload</a>
<?php
$images = getImages($_GET['gallery_id']);
?>
<div class="gallery">
<?php
foreach ($images as $image) {
// $firstImage = $db->getImages($galleries[$i]["gallery_id"], 1
  ?>
  <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
          <img src=<?="../".$image['image_path']?> alt="<?= $image["name"] ?>">
          <a href=<?= "/php/index.php?id=deletePicture&image_id=".$image["image_id"] ?> class="btn btn-danger pull-right delete">delete</a>
      </div>
  </div>
</div>
<?php
 }
  ?>
