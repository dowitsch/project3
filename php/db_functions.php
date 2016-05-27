<?php
/*
 *  @autor Michael Abplanalp
 *  @version 1.0
 *
 *  Dieses Modul beinhaltet sämtliche Datenbankfunktionen.
 *  Die Funktionen formulieren die SQL-Anweisungen und rufen dann die Funktionen
 *  sqlQuery() und sqlSelect() aus dem Modul basic_functions.php auf.
 *
 */

function db_insert_benutzer($user) {
    $sql = "insert into benutzer (vorname, nachname, email, passwort)
            values ('".escapeSpecialChars($user['vorname'])."','".escapeSpecialChars($user['nachname'])."','".escapeSpecialChars($user['email'])."','".($user['passwort'])."')";
    sqlQuery($sql);
}

function get_user($email) {
  $sql = "select * from benutzer where email='".$email."';";
  $result = sqlSelect($sql);
  return $result[0];
}
