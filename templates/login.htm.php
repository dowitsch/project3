<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h5 class="text-center">
                        LOGIN</h5>
                    <form name="login" action="<?php echo getValue('phpmodule'); ?>" method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                <input type="email" class="form-control" name="email" placeholder="Email" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                <input type="password" class="form-control" name="password" placeholder="Password" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary btn-block">SUBMIT</button>
                    </form>
                </div>
                <?php echo runTemplate("../templates/errors.htm.php"); ?>
            </div>
        </div>
    </div>
</div>