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
            values ('".escapeSpecialChars($user['vorname'])."','".escapeSpecialChars($user['nachname'])."','".escapeSpecialChars($user['email'])."','".md5(($user['passwort']))."')";
    sqlQuery($sql);
}

function get_user($email) {
  $sql = "select * from benutzer where email='".$email."';";
  $result = sqlSelect($sql);
  return $result[0];
}

function getGalleries($user_id) {
        $sql = "select * from gallery where bid = ".$user_id.";";
        return sqlSelect($sql);
    }

/**
 * Delete gallery from the DB
 * @param type $gallery_id
 * @param type $user_id
 */
function deleteImage($user_id, $image_id) {
    $sql = "delete from image where image_id = ".$image_id." AND user_id = ".$user_id.";";
    sqlQuery($sql);
}


/**
 * Returns all images belonging to a certain gallery
 *
 * @param int $gallery_id
 * @param int $limit
 * @return array
 */
function getImages($gallery_id) {
    $sql = "SELECT * FROM image WHERE gallery_id = ".$gallery_id." AND user_id = ".getSessionValue("benutzerId").";";
    return sqlSelect($sql);
}

function getThumbs($gallery_id) {
    $sql = "SELECT thumbnail, filetype, name FROM image WHERE gallery_id = ?";
    $dbh = $this->con->prepare($sql);
    $dbh->execute(array($gallery_id));
    return $dbh->fetchAll();
}

/**
 * Insert a new gallery to the database
 * @param type $name
 * @param type $desc
 * @param type $user_id
 */
function insertGallery($gallery) {

    $sql = "insert into gallery (name, description, bid)
            values ('".escapeSpecialChars($gallery['name'])."','".escapeSpecialChars($gallery['description'])."','".getSessionValue("benutzerId")."')";
    sqlQuery($sql);
}

/**
 * Delete gallery from the DB
 * @param type $gallery_id
 * @param type $user_id
 */
function deleteGallery($user_id, $gallery_id) {
    $sql = "delete from gallery where gallery_id = ".$gallery_id." AND bid = ".$user_id.";";
    sqlQuery($sql);
}

/**
 * Inserts the image to the database
 * @param type $name
 * @param type $thumbnail
 * @param type $image_path
 * @param type $filetype
 * @param type $user_id
 * @param type $gallery_id
 */
function insertImage($image, $thumb) {
    $sql = "INSERT INTO image (name, thumbnail, image_path, file_type, user_id, gallery_id)
            VALUES ('".$image['name']."','".$thumb."','uploads/".$_FILES['file']['name']."' , '".$_FILES['file']['type']."',".getSessionValue('benutzerId'). ",".$_GET['gallery_id']. ");";
    sqlQuery($sql);
}

function insertTag($name, $image_id) {
    $sql = "INSERT INTO tag (name, image_id)
            VALUES ('".$name."', ".$image_id.")";
    sqlQuery($sql);
}

function getTags($image_id) {
  $sql = "SELECT * FROM tag WHERE image_id = ".$image_id.";";
  return sqlSelect($sql);
}
