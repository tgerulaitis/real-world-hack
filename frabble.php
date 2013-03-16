<?php require('functions.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
  </head>
  <body>

    <?php require('header.php'); ?>
    
    <h1>Local Frabble</h1>
    
    <?php $movie = getMovie(); ?>
    <?php var_dump($movie); ?>
    
    <?php require('footer.php'); ?>
  </body>
</html>