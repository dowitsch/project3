<?php $gallery = getUpdateGallery($_GET['gallery_id']); ?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center">
                        Update Gallery</h5>
             	  	<form name="updateGalleryForm" action="<?php "/php/index.php?id=galleryUpdate&gallery_id=".$_GET['gallery_id'] ?>" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control" name="name" placeholder=<?=$gallery[0]['name'] ?> />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control" name="description" placeholder=<?=$gallery[0]['description'] ?>  />
                        </div>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary btn-block">SUBMIT</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
