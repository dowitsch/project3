<?php
/**
 * @author Yanik Künzi <y.kuenzi@gmail.com>
 *
 * Displays the galleries of the user
 */
$galleries = getGalleries($_SESSION["benutzerId"]);
?>
<?php
foreach ($galleries as $gallery) {
//$firstImage = $db->getImages($galleries[$i]["gallery_id"], 1);
    ?>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <a href="id=show_gallery&gallery_id=<?= $gallery["gallery_id"] ?>">
                <img src="images/foto-top.png" alt="<?= $gallery["name"] ?>">
                <div class="caption">
                    <h3><?= $gallery["name"] ?></h3>
                    <?= $gallery["description"] ?>
                </div>
            </a>
            <a href="/php/index.php?id=deleteFotoalben" class="btn btn-danger pull-right">delete</a>
        </div>
    </div>
    <?php
}
