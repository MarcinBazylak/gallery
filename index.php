<?php

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
   <title>Galeria zdjęć</title>
   <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
   <script>
   $("#image").on("change", function() {
    if ($("#image")[0].files.length > 20) {
        alert("Maksymalnie 20 zdjęć");
    } else if ($("#image")[0].files.length > 0) {
        $("#form").submit();
    }
   });
   </script>

</body>
</html>