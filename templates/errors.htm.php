<?php
  $errors = getSessionValue('errors');
  if($errors !== ""){
    foreach ($errors as $error) {
?>
      <div class="alert-danger alert">
        <?= $error ?>
      </div>
<?php
    }
  }
  setSessionValue('errors', '');
?>

