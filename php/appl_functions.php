<?php
/*
 *  @autor Daniel Mosimann
 *  @version 2.0
 *
 *  Dieses Modul beinhaltet Funktionen, welche die Anwendungslogik implementieren.
 *
 */

/*
 * Gibt die entsprechende CSS-Klasse aus einem assiziativen Array (key: Name Eingabefeld) zur�ck.
 * Wird im Template aufgerufen.
 *
 * @param   $name       Name des Eingabefeldes
 */
function getCssClass( $name ) {
    global $css_classes;
    if ( isset($css_classes[$name]) ) return $css_classes[$name];
    else return getValue('cfg_css_class_normal');
}

/*
 * Funktion zur Eingabepr�fung.
 */
function checkInput() {
    global $css_classes;

    $status = true;

    if ( !CheckName( $_REQUEST['name'] ) ) {
        $css_classes['name'] = getValue('cfg_css_class_error');
        $status = false;
    }

    if ( !CheckEmail( $_REQUEST['email'] ) ) {
        $css_classes['email'] = getValue('cfg_css_class_error');
        $status = false;
    }

    return $status;
}

/*
 * Beinhaltet die Anwendungslogik zur Verwaltung des Kontaktformulars
 */
function kontakt() {
    // Der Schaltknopf "senden" wurde bet�tigt
    if ( isset($_REQUEST['senden']) ) {
        if ( checkInput() ) {
            db_insert_kontakt( $_REQUEST );
            redirect(__FUNCTION__);
        } else {
            setValues( $_REQUEST );
        }
    // Der Schaltknopf "abbrechen" wurde bet�tigt
    } else if ( isset($_REQUEST['abbrechen']) ) {
	redirect(__FUNCTION__);
    }

    // Template abf�llen und Resultat zur�ckgeben
    setValue( 'phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__ );
    return runTemplate( "../templates/kontakt.htm.php" );
}

/*
 * Beinhaltet die Anwendungslogik zur Ausgabe der Kontaktliste
 */
function liste() {
    // �ergebener Eintrag in DB l�schen
    if ( isset($_REQUEST['kid']) ) db_delete_kontakt( $_REQUEST['kid'] );
    // Alle Daten (Kontakte) aus der DB lesen und der Variablen "data" zuweisen
    setValue( 'data', db_select_kontakt() );
    // Falls Daten vorhanden sind, Template ausf�hren und Resultat zur�ckgeben
    if ( count(getValue('data')) ) {
        setValue( 'phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__ );
        return runTemplate( "../templates/liste.htm.php" );
    } else {
        return "Liste ist leer...";
    }
}

?>