<?php
/*
 *  @autor Michael Abplanalp
 *  @version 1.0
 *
 *  Dieses Modul definert alle Konfigurationsparameter und stellt die DB-Verbindung her.
 */

// Akzeptierte Funktionen Login
setValue('cfg_func_login', array("login","registration"));
// Akzeptierte Funktionen Memberbereich
setValue('cfg_func_member', array("fotoalben","logout", "galleryForm", "pictureForm", "showGallery", "deleteFotoalben", "deletePicture"));
// Inhalt des Login-Menus
setValue('cfg_menu_login', array("login"=>"Login","registration"=>"Registration"));
// Inhalt des Menus im Memberbereich
setValue('cfg_menu_member', array("fotoalben"=>"Fotoalben", "galleryForm"=>"Create Gallery", "logout"=>"Logout"));
// Inhalt des Login-Menus
setValue('cfg_menu_login', array("login"=>"Login","registration"=>"Registration"));



$db = mysqli_connect("localhost", "root", "sql", "bilderdb");	// Zu Datenbankserver verbinden
setValue('cfg_db', $db);
?>
