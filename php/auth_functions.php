<?php
/*
 *  @autor Michael Abplanalp
 *  @version 1.0
 *
 *  Dieses Modul beinhaltet Funktionen, welche die Logik zur Authentifizierung implementieren.
 *
 */

/*
 * Beinhaltet die Anwendungslogik zur Registration
 */
function registration() {
  // Template abfüllen und Resultat zurückgeben
  setValue( 'phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__ );
  return runTemplate( "../templates/registration.htm.php" );
}

function logout(){
  session_destroy();
}

/*
 * Beinhaltet die Anwendungslogik zum Login
 */
function login() {
  $email = $_POST['email'];
  $password = $_POST['password'];
  if(isset($email) && isset($password)){
    $user = get_user($email);
    if(authenticate_user($user, $password)){
      setSessionValue("benutzerId", $user["bid"]);
      redirect('fotoalben');
    }
  }
	setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
	return runTemplate( "../templates/login.htm.php" );
}

/*
 * Prüft, ob ein Benutzer angemeldet ist
 */
function angemeldet() {
	if (strlen(getSessionValue("benutzerId")) > 0) return true;
	else return false;
}

function authenticate_user($user, $password){
  return $user["passwort"] == md5($password);
}
?>