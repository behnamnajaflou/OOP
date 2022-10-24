<?php require_once APPROOT . '/views/inc/header.php';  ?>
<h1><?php echo $data['title'];  ?></h1>
<p class="lead"><?php echo $data['description'];  ?></p>
<p class="lead">Version: <?php echo APPVERSION;  ?></p>
<?php require_once APPROOT . '/views/inc/footer.php';  ?>