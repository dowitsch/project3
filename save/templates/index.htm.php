<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
	<title>Bilderdatenbank</title>
</head>
<body>
	<div align="center">
		<table class="top" width="1004" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td id="topimg" width="1004" height="100" colspan="2"></td>
			</tr>
			<tr>
			  <td class="header" height="20" colspan="2">
			  </td>
			</tr>
			<tr>
				<td class="nav" width="200" valign="top" align="center">
                    <?php echo getMenu(getValue(getValue('menu_eintraege')), getValue('menu_titel')); ?>
				</td>
				<td class="content" width="804" valign="top" align="left">
                    <table border="0" width="100%" cellpadding="5" cellspacing="0">
                        <tr><td> <?php echo getValue('inhalt');?> </td></tr>
                    </table>
                </td>
			</tr>
			<tr>
				<td colspan="2">
					<table class="bottom" width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr height="5">
							<td class="footer" height="15">
								<span class="wb10">&copy; Copyright IET-gibb</span>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>
