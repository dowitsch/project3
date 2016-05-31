

  <a href= <?="index.php?id=pictureForm&gallery_id=".$_GET['gallery_id']?> class="btn btn-default pull-left">upload</a>
  <a href= <?="/php/index.php?id=galleryUpdate&gallery_id=".$_GET['gallery_id']?> class="btn btn-default pull-left">Edit Gallery</a>

  <?php
  if(isset($_GET['tag'])){
    $images= getImages($_GET['gallery_id'], $_GET['tag']);
  }else{
    $images = getImages($_GET['gallery_id']);
  }
  ?>
  <div class="gallery">
  <?php
  foreach ($images as $image) {
  // $firstImage = $db->getImages($galleries[$i]["gallery_id"], 1
    ?>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <a href=<?= "index.php?id=showImage&image_path=". $image["image_path"]."&image_id=". $image["image_id"] ?> >
            <?php echo "<img src=data:".$image['file_type'].";base64,".$image['thumbnail'] ." alt=".$image["name"] . " />"; ?>
            </a>
            <a href=<?= "index.php?id=deletePicture&image_id=".$image["image_id"] ?> class="btn btn-danger pull-right delete">delete</a>
        </div>
    </div>
  </div>
  <?php
   }
    ?>
    <div class="suche">
    <form action="index.php?" method="get">
      <div class="form-group">
        <div class="input-group">
          <input class="form-control" type="text" placeholder="Search for tags" name="tag">
        </div>
      </div>
      <input type="hidden" name="id" value="showGallery" >
      <input type="hidden" name="gallery_id" value=<?= $_GET['gallery_id'] ?> >
    </form>
    <a href= <?="index.php?id=showGallery&gallery_id=".$_GET['gallery_id']?>> Suche zurücksetzen</a>
  </div>
