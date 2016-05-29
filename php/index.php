 <?php
 require('/home/fammann/programs/psysh');
/*
 *  @autor Michael Abplanalp
 *  @version 1.0
 *
 *  Ausschliessliche dieses Modul wird über die URL aufgerufen. Je nach übergebenem
 *  Parameter "id" wird die entsprechende Funktion ausgeführt. Am Schluss wird das
 *  Haupttemülate eingefügt.
 *
 *  Beispielaufruf:         http://localhost/index.php?id=show
 *
 *  Im Beispiel wird die Funktion "show" ausgeführt.
 */
session_start();
include("basic_functions.php");
include("config.php");
include("db_functions.php");
include("auth_functions.php");
include("appl_functions.php");

// Anmeldung oder andere Sicherheitschecks, falls erwünscht!
// anmeldung(), check_security(), etc.

if (angemeldet()) {
  // session_destroy();
	// Falls cfg_func_member nicht existiert, abbrechen!
	$flist = getValue('cfg_func_member');
	if (!count($flist)) die("cfg_func_member nicht definiert!");
	// Das Menu aufs Hauptmenu setzen (Memberbereich)
	setValue('menu_titel', 'Hauptmenü');
	setValue('menu_eintraege', 'cfg_menu_member');
} else {
	// Falls cfg_func_login nicht existiert, abbrechen!
	$flist = getValue('cfg_func_login');
	if (!count($flist)) die("cfg_func_login nicht definiert!");
	// Das Menu aufs Loginmenu setzen
	setValue('menu_titel', 'Login-Menü');
	setValue('menu_eintraege', 'cfg_menu_login');
}
// Dispatching, die über den Parameter "id" definierte Funktion ausführen
$func = getId();
// Falls  die verlangte Funktion nicht in der Liste der akzeptierten Funktionen ist, Default-Seite laden!
if (!in_array($func, $flist)) {
	redirect($flist[0]);
	exit;
}
// Aktiver Link global speichern, da dieser später noch verwendet wird
setValue('func', $func);
// Funktion aufrufen und Rückgabewert in "inhalt" speichern
setValue('inhalt', $func());
// Haupttemplate aufrufen, Ausgabe an Client (Browser) senden
echo runTemplate("../templates/index.htm.php");
?>
