<?php
/**
 *  @autor Michael Abplanalp
 *  @version 2.0
 *
 *  Dieses Modul stellt grundlegende Funktionen zur Verfügung und ist damit
 *  Bestandteil des MVC-GIBS.
 *
 */

/*
 * Assoziativer, globaler Array für den Transport von Werten zwischen Anwendung und Templates
 */
//$params = array();

/**
 * Führt ein HTML-Template aus und gibt das Produkt zurück.
 *
 * @param     $template     Filename des Templates
 * @param     $params       Assoziativer Array mit Werten, welche im Template eingefügt werden.
 *                          key: Name der Variable, value: Wert
 */
function runTemplate($template) {
	ob_start();
	include($template);
	$inhalt=ob_get_contents();
	ob_end_clean();
	return $inhalt;
}

/*
 * Einen Wert im globalen Array $params speichern.
 *
 * @param       $key        Schlüssel des Wertes (Index im globalen Array)
 * @param       $value      Wert des Wertes
 *
 */
function setValue($key, $value) {
    global $params;
    $params[$key] = $value;
}

/*
 * Mehrere Werte im globalen Array $params speichern.
 *
 * @param       $list      Assoziativer Array mit den zu speichernden Werten
 *
 */
function setValues($list) {
    global $params;
    if ( count($list )) {
        foreach ($list as $k => $v ) {
            $params[$k] = $v;
        }
    }
}

/*
 * Liefert die über den Parameter "id" definierte Funktion zurück
*/
function getId() {
	if (isset($_REQUEST['id'])) return $_REQUEST['id'];
	else return "";
}

/*
 * Wert aus dem globalen Array lesen
 *
 * @param       $key      Index des gewünschten Wetes
 *
 */
function getValue($key) {
    global $params;
	if (isset($params[$key])) return $params[$key];
	else return "";
}

/*
 * Wert aus dem globalen Array lesen und in HTML-Syntax umwandeln
 *
 * @param       $field      Index des gewünschten Wetes
 *
 */
function getHtmlValue($key) {
    global $params;
	if (isset($params[$key])) return htmlentities($params[$key]);
	else return "";
}

/*
 * Erstellt das Menu und gibt dieses aus. Wird im Haupttemplate aufgerufen.
 * @param   $mlist      Array mit den Menueinträgen. key: ID (Funktion), value: Menuoption
 * @param   $title      Menutitel
 */
function getMenu($mlist, $title="") {
	$loginMenu = isLoginMenu();
    if (count($mlist)) {
        $active_link = getId();
        if (empty($active_link)) $active_link=key($mlist);
        $printmenu = "<table border='0' class='table_menu'>\n";
        if (!empty($title)) $printmenu .= "<tr><th align='left'>$title</th></tr>\n";
		if ($loginMenu) {
			foreach ($mlist as $index=>$value) {
				if ($index == $active_link) $active = "id='active'";
				else $active = "";
				$printmenu .= "<tr><td nowrap><a class='link_menu' $active href='".$_SERVER['PHP_SELF']."?id=$index'>$value</a></td></tr>\n";
			}
		} else {
			$menuEntry = getValue('cfg_menu_level_member');
			foreach ($mlist as $index=>$value) {
				if ($index == $active_link) $active = "id='active'";
				else $active = "";
				$printmenu .= "<tr><td nowrap><a class='link_menu' $active href='".$_SERVER['PHP_SELF']."?id=$index'>$value</a></td></tr>\n";
			}
        }
        $printmenu .= "</table>\n";
    }
    return $printmenu;
}

/*
 * Prüft, ob es sich um das Login-Menu handelt (ansonsten = Member-Menu)
 */
function isLoginMenu() {
  if (getValue('menu_eintraege') == "cfg_menu_login") return true;
  else return false;
}

/*
 * Wert in den superglobalen Array $_SESSION schreiben
 *
 * @param       $key      Index des gewünschten Wertes
 * @param       $value    Wert, der in die Variable geschrieben wird
 *
 */
function setSessionValue($key, $value) {
    $_SESSION[$key] = $value;
}

/*
 * Wert aus dem superglobalen Array $_SESSION lesen
 *
 * @param       $key      Index des gewünschten Wertes
 *
 */
function getSessionValue($key) {
	if (isset($_SESSION[$key])) return $_SESSION[$key];
	else return "";
}

/**
 * Übergebenen String escapen (Sicherheitsgründe!) und zurückgeben
 *
 * @param   $attribut       Attribut, das in eine Tabelle eingefügt werden soll
 */
function escapeSpecialChars($attribut) {
	return mysqli_real_escape_string(getValue('cfg_db'), $attribut);
}

/**
 * Übergebene SQL-Anweisung auf der DB ausführen und Resultat zurückgeben.
 *
 * @param   $sql       Select-Befehl, welcher ausgeführt werden soll
 */
function sqlSelect($sql) {
	$data = "";
 	$result = mysqli_query(getValue('cfg_db'), $sql);
 	if (!$result ) die("Fehler: ".mysqli_error());
 	while ($row=mysqli_fetch_assoc($result)) $data[]=$row;
	return $data;
}

/**
 * Führt einen SQL-Befehl aus.
 *
 * @param   $sql    SQL-Befehl, welcher ausgeführt werden soll
 */
 function sqlQuery($sql) {
	$result = mysqli_query(getValue('cfg_db'), $sql);
 	if (!$result) die(mysqli_error(getValue('cfg_db'))."<pre>".$sql."</pre>");
}

/**
 * Aktives php-Modul noch einmal aufrufen.
 *
 * @param   $id     ID der Funktion, welche aufgerufen werden soll
 */
function redirect($id="") {
    if (!empty($id)) $id="?id=$id";
    header("Location: ".$_SERVER['PHP_SELF'].$id);
    exit();
}

/**
 * Prüft ob ein Eingabewert leer ist oder nicht.
 *
 * @param   $value      Eingabewert
 * @param   $maxlength  Minimale Länge der Eingabe
 */
function CheckEmpty($value, $minlength=Null) {
    if (empty($value)) return false;
    if ( $minlength != Null && strlen($value) < $minlength ) return false;
    else return true;
}

/**
 * Prüft, ob eine Emailadresse korrekt ist oder nicht.
 *
 * @param   $value      Eingabewert
 * @param   $empty      Die Email-Adresse kann leer sein ('Y') oder nicht ('N')
 */
function CheckEmailFormat($value, $empty='N') {
    $pattern_email = '/^[^@\s<&>]+@([-a-z0-9]+\.)+[a-z]{2,}$/i';
    if ($empty=='Y' && empty($value)) return true;
    if ( preg_match($pattern_email, $value) ) return true;
    else return false;
}

/**
 * Prüft, ob eine Name (Nachname, Vorname) korrekt ist oder nicht.
 * Erlaubt sind die Zeichen in den eckigen Klammern, mit einer Länge
 * von mindestens 2 Zeichen.
 *
 * @param   $value      Eingabewert
 * @param   $empty      Der Name kann leer sein ('Y') oder nicht ('N')
 */
function CheckName($value, $empty='N') {
    $pattern_name = '/^[a-zA-ZäöüÄÖÜ \-]{2,}$/';
    if ($empty=='Y' && empty($value)) return true;
    if (preg_match($pattern_name, $value)) return true;
    else return false;
}

/**
 * Prüft, ob ein Passwort korrekt ist oder nicht. Das Pattern:
 *  - Die Länge muss 8-20 Zeichen sein
 *  - Es muss mind. 1 Ziffer enthalten sein (?=.*\d)
 *  - Es muss min. 1 Kleinbuchstabe enthalten sein (?=.*[a-z])
 *  - Es muss min. 1 Grossbuchstabe enthalten sein(?=.*[A-Z])
 *  - Es muss min. 1 Sonderzeichen enthalten sein (\W = Alle Zeichen ausser Ziffern und Buschstaben und "_")
 *
 * @param   $value      Eingabewert
 */
function CheckPasswordFormat($value) {
	$pattern_pw = '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,20}$/';
    if (preg_match($pattern_pw, $value)) return true;
    else return false;
}

/**
 * Prüft ob zwei Passwörter identisch sind.
 *
 * @param   $value1     Passwort
 * @param   $value2     Passwortwiederholung
 */
function CheckPasswordCompare($value1, $value2) {
    if ($value2 == $value1) return true;
	else return false;
}

/*
 * Verschluesselt das Passwort mit einem Hash-Algorithmus
 *
 * @param       $passwort      Das Passwort, das verschlüsselt wird
 *
*/
function passwordHash($passwort) {
	return password_hash($passwort, PASSWORD_BCRYPT);
}

/*
 * Liefert den Wert des gewünschten Parameters zurück, der via POST bzw. GET übergeben worden ist
*/
function getRequestParam($param) {
	if (isset($_REQUEST[$param])) return $_REQUEST[$param];
	else return "";
}

/*
 * Bereitet einen Text für die Ausbage in HTML vor
*/
function htmlTextAufbereiten($value) {
	return nl2br(htmlentities($value));
}

/**
 * Prüft ob es sich beim übergebenen Wert um eine Zahl handelt.
 *
 * @param   $value      Übergebender Wert
 */
function isNumber($value) {
    if (!is_numeric($value)) return false;
    return true;
}

/**
 * Prüft ob es sich beim übergebenen Wert um eine positive Ganzzahl handelt (ohne e,+,-).
 *
 * @param   $value      Übergebender Wert
 */
function isCleanNumber($value) {
    if (!is_numeric($value)) return false;
    $pattern_number = '/^[0-9]*$/';
    if (preg_match($pattern_number, $value)) return true;
    else return false;
    return true;
}

/**
 * Prüft ob ein Eingabewert eine Zahl ist. Eine Leereingabe ist erlaubt.
 *
 * @param   $value         Eingabewert
 * @param   $minlength     Minimale Länge der Zahl
 */
function CheckCleanNumberEmpty($value, $minlength=0) {
    if (empty($value)) return true;
    if (!isCleanNumber($value) || strlen($value) < $minlength) return false;
    else return true;
}
?>