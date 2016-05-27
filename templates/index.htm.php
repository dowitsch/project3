<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8"/>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="../js/bootstrap.js"></script>
  <script src="../js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
	<title>Bilderdatenbank</title>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<?php echo getMenu(getValue(getValue('menu_eintraege')), getValue('menu_titel')); ?>

            </div>
        </div>
    </nav>



    <!-- Page Content -->
    <div class="pagecontent">
        		<?php echo getValue('inhalt');?>
    </div>

</body>

</html>
