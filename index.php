<?php
header("Content-Type: text/html; charset=utf-8");

include 'autoload.php';

include_once 'includes/db.php';
include_once 'includes/functions.php';

$photo = new Photos;

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/lbx.css">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Gallery</title>
   <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
   <script src="lightbox/dist/js/lightbox.js"></script>
</head>
<body>

   <div class="container">

   <?php
   if (empty($_GET['page'])) {
      include 'main.php';
   } else {
      include $_GET['page'] . '.php';
   }
   ?>

   </div>
   
   <script>
    lightbox.option({
      'resizeDuration': 500,
      'wrapAround': true,
      'showImageNumberLabel': false
    });
</script>

</body>
</html>