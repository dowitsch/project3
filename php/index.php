<?php
/*
 *  @autor Daniel Mosimann
 *  @version 2.0
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
include("appl_functions.php");

// Anmeldung oder andere Sicherheitschecks, falls erwünscht!
// anmeldung(), check_security(), etc.

// Dispatching, die über den Parameter "id" definierte Funktion ausführen
$func = isset($_REQUEST['id']);
// Falls  cfg_func_list nicht existiert, abbrechen!
$flist = getValue('cfg_func_member'); 	
if ( !count($flist) ) die("cfg_func_member nicht definiert!");
// Falls  die verlangte Funktion nicht in der Liste der akzeptierten Funktionen ist, Default-Wert setzen!
if ( !in_array($func, $flist) ) $func = $flist[0];
// Aktiver Link global speichern, da dieser später noch verwendet wird
setValue('func', $func);
// Funktion aufrufen und Rückgabewert in "inhalt" speichern
setValue( 'inhalt', $func() );

// Haupttemplate aufrufen, Ausgabe an Client (Browser) senden
echo runTemplate("../templates/index.htm.php");
?>
