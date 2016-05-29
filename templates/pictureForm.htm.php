<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center">
                        Upload a Picture</h5>
             	  	<form name="pictureForm" action="<?php echo getValue('phpmodule') . "&gallery_id=". $_GET['gallery_id']; ?>" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control" name="name" placeholder="name" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="file" class="form-control" name="file" placeholder="File" />
                        </div>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary btn-block">SUBMIT</button>
                </div>
                </form>
                <?php echo runTemplate("../templates/errors.htm.php"); ?>
            </div>
        </div>
    </div>
</div>
</div>
