<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center">
                        CREATE GALLERY</h5>
             	  	<form name="gallery_form" action="<?php echo getValue('phpmodule'); ?>" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control" name="name" placeholder="name" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control" name="description" placeholder="Description" />
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
