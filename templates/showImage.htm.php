<?php
$tags = getTags($_GET['image_id']);
echo "<img src= ../" . $_GET['image_path'] ." />";
foreach ($tags as $tag) {
  ?>
  <h2><span class="label label-primary"><?=$tag['name']?></span></h2>
  <?php
}
?>

<h5 class="text-center">
    add a tag</h5>
<form name="pictureForm" action=<?= "index.php?id=addTag&image_id=" .$_GET['image_id']?> method="post">
<div class="form-group">
    <div class="input-group">
        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
        <input type="text" class="form-control" name="name" placeholder="name" />
    </div>
</div>
<button type="submit" class="btn btn-sm btn-primary btn-block">SUBMIT</button>
</form>
