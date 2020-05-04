   <h1>Galeria zdjęć</h1>

<?php
if(!empty($_GET['id'])) {
   $photo->delPhoto($_GET['id']);
}
?>
      <a href="index.php"><button class="add">Strona główna</button></a><br><br>
      Kliknij na zdjęcie aby je usunąć.
      <div class="wrapper">   
<?php

   foreach($photo->getAllPhotos() as $photograph) {

      echo'         <a style="display: contents; position: relative;" href="index.php?page=delete&id=' . $photograph['id'] . '">
            <img src="photos/' . $photograph['id'] . '.jpg" class="delete" loading="lazy">
         </a>
      ';

   }

?>
</div>
