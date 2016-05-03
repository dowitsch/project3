<?php
/*
 *  @autor Daniel Mosimann
 *  @version 2.0
 *
 *  Dieses Modul beinhaltet sämtliche Datenbankfunktionen.
 *  Die Funktionen formulieren die SQL-Anweisungen und rufen dann die Funktionen
 *  sqlQuery() und sqlSelect() aus dem Modul basic_functions.php auf.
 *
 */

function db_insert_kontakt( $params ) {
    $sql = "insert into kontakte (name, vorname, strasse, plz, ort, email, tpriv, tgesch)
            values ('".addslashes($params['name'])."','".addslashes($params['vorname'])."','".addslashes($params['strasse'])."','".
                       $params['plz']."','".addslashes($params['ort'])."','".
                       addslashes($params['email'])."','".addslashes($params['tpriv'])."','".addslashes($params['tgesch'])."')";
    sqlQuery($sql);
}

function db_select_kontakt() {
    return sqlSelect("select * from kontakte");
}

function db_delete_kontakt( $kid ) {
    if ( isCleanNumber($kid) ) sqlQuery("delete from kontakte where kid='$kid'");
}

?>