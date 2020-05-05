<?php
include 'autoload.php';

include_once 'includes/db.php';
include_once 'includes/functions.php';

$photo = new Photos;

   if($_POST['add'] == 1) {
      $j = $photo->addPhoto($_FILES);
   }

   echo '
   <div class="wrapper">';
   
   
      foreach($photo->getUploadedPhotos($j) as $photograph) {
   
         echo'
            <a style="display: contents; position: relative;" href="photos/' . $photograph['id'] . '.jpg" data-lightbox="gallery" data-title="dodano ' . $photograph['date'] . '">
               <img src="photos/' . $photograph['id'] . '.jpg" loading="lazy" alt="Zdjęcie z galerii">
            </a>';
   
      }
   
   
   echo '</div>';

?>