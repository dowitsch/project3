<form name="kontakt" action="<?php echo getValue('phpmodule') ?>" method="post">
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
      <table class="kontakt" border="0" cellpadding="5" cellspacing="1">
        <tr>
          <td width="120"><span class="label">Name:</span></td>
          <td><input class="<?php echo getCssClass('name') ?>" type="text" name="name" value="<?php echo getHtmlValue('name') ?>" size="20" maxlength="20"></td>
        </tr>
        <tr>
          <td><span class="label">Vorname:</span></td>
		  <td><input class="<?php echo getCssClass('vorname') ?>" type="text" name="vorname" value="<?php echo getHtmlValue('vorname') ?>" size="15" maxlength="15"></td>
        </tr>
        <tr>
          <td><span class="label">Strasse:</span></td>
		  <td><input class="txt" type="text" name="strasse" value="<?php echo getHtmlValue('strasse') ?>" size="30" maxlength="30"></td>
        </tr>
        <tr>
        <tr>
          <td><span class="label">PLZ:</span></td>
		  <td>
		  	<input class="<?php echo getCssClass('plz') ?>" type="text" name="plz" value="<?php echo getHtmlValue('plz') ?>" size="5" maxlength="10">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ort: <input class="<?php echo getCssClass('ort') ?>" type="text" name="ort" value="<?php echo getHtmlValue('ort') ?>" size="20" maxlength="30">
		  </td>
        </tr>		
          <td><span class="label">Email:</span></td>
		  <td><input class="<?php echo getCssClass('email') ?>" type="text" name="email" value="<?php echo getHtmlValue('email') ?>" size="30" maxlength="50"></td>
        </tr>
        <tr>
          <td><span class="label">Telefon Privat:</span></td>
		  <td><input class="txt" type="text" name="tpriv" value="<?php echo getHtmlValue('tpriv') ?>" size="20" maxlength="20">
		  </td>
        </tr>
        <tr>
          <td><span class="label">Telefon Geschäft:</span></td>
		  <td><input class="txt" type="text" name="tgesch" value="<?php echo getHtmlValue('tgesch') ?>" size="20" maxlength="20"></td>
        </tr>
      </table>
	</td>
	<td width="50">
	</td>
	<td valign="top">
	  <table border="0" cellpadding="2" cellspacing="0">
	    <tr>
		  <td>
		    <input type="submit" name="senden" value="senden">
		  </td>
		</tr>	  
	    <tr>
	    <tr>
		  <td>
		    <input type="submit" name="abbrechen" value="abbrechen">
		  </td>
	  </table>
	</td>
  </tr>
</table>

</form>