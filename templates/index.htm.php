<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>MVC GIBS</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
        <script src="../js/javascript.js" type="text/javascript"></script>
</head>
<body>
    <div align="center">

        <table class="container"  width="1004" border="1" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="1004" height="60" colspan="2" align="center">
                   <h1>MVC GIBS</h1>
                <td>
            </tr>
            <tr>
                <td width="154" valign="top" align="center">
                    <?php echo getMenu(getValue('cfg_menu_list'), "Hauptmenu") ?>
                </td>
		<td valign="top" align="left">
                    <table border="0" width="100%" cellpadding="5" cellspacing="0">
                    <tr><td> <?php echo getValue('inhalt') ?> </td></tr>
                    </table>
                </td>
            </tr>
            <tr>
                 <td colspan="2">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td height="15" align="center">
				<span class="s10">&copy; Copyright GIBS Solothurn</span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
