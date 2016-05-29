<?php
/*
 *  @autor Michael Abplanalp
 *  @version 1.0
 *
 *  Dieses Modul beinhaltet Funktionen, welche die Anwendungslogik implementieren.
 *
 */

/*
 * Gibt die entsprechende CSS-Klasse aus einem assiziativen Array (key: Name Eingabefeld) zurück.
 * Wird im Template aufgerufen.
 *
 * @param   $name       Name des Eingabefeldes
 */
function getCssClass( $name ) {
    global $css_classes;
    if (isset($css_classes[$name])) return $css_classes[$name];
    else return getValue('cfg_css_class_normal');
}

/*
 * Beinhaltet die Anwendungslogik zur Anzeige und zum Bearbeiten von allen Fotoalben
 */
function fotoalben() {
    // Template abfüllen und Resultat zurückgeben
    setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
    return runTemplate( "../templates/fotoalben.htm.php" );
}

function galleryForm() {
    // Template abfüllen und Resultat zurückgeben
    if(!empty($_POST)) {
      insertGallery($_POST);
      redirect('fotoalben');
      return;
    }
    setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
    return runTemplate( "../templates/galleryForm.htm.php" );
}

function deleteFotoalben(){
  deleteGallery(getSessionValue('benutzerId'), $_GET['gallery_id']);
  redirect('fotoalben');
}

function showGallery(){
  setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
  return runTemplate( "../templates/showGallery.htm.php" );
}

function deletePicture(){
  deleteImage(getSessionValue('benutzerId'), $_GET['image_id']);
  redirect('fotoalben');
}

function pictureForm(){
  if(!empty($_POST)) {
    $imagepath = "../uploads/" . $_FILES["file"]["name"];
    saveImage();
    $thumb = make_thumb($imagepath);
    insertImage($_POST, $thumb);
  }
  setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
  return runTemplate( "../templates/pictureForm.htm.php" );
}

function showImage(){
  setValue('phpmodule', $_SERVER['PHP_SELF']."?id=".__FUNCTION__);
  return runTemplate( "../templates/showImage.htm.php" );
}

function addTag(){
  insertTag($_POST['name'], $_GET['image_id']);
  redirect('fotoalben');
}
?>
