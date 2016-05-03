<?php
/*
 *  @autor Michael Abplanalp
 *  @version 1.0
 *
 *  Dieses Modul definert alle Konfigurationsparameter und stellt die DB-Verbindung her.
 */

// Default-CSS-Klasse zur Formatierung der Eingabefelder
setValue('cfg_css_class_normal',"txt");
// Klasse zur Formatierung der Eingabefelder, falls die Eingabeprüfung negativ ausfällt
setValue('cfg_css_class_error',"err");
// Akzeptierte Funktionen Login
setValue('cfg_func_login', array("login","registration"));
// Akzeptierte Funktionen Memberbereich
setValue('cfg_func_member', array("fotoalben","logout"));
// Inhalt des Login-Menus
setValue('cfg_menu_login', array("login"=>"Login","registration"=>"Registration"));
// Inhalt des Menus im Memberbereich
setValue('cfg_menu_member', array("fotoalben"=>"Fotoalben"));

// Datenbankverbindung herstellen
$db = mysqli_connect("127.0.0.1", "admin", "gibbiX12345", "project3");	// Zu Datenbankserver verbinden		
setValue('cfg_db', $db);
?>