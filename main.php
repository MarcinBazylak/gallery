   <h1>Galeria zdjęć</h1>
   <?php

   if($_POST['add'] == 1) $photo->addPhoto($_FILES);
   ?>
      <a href="index.php?page=delete"><button class="add">Usuń zdjęcie</button></a>
      <form id="form" enctype="multipart/form-data" action="index.php" method="POST">
            <input type="hidden" name="add" value="1">
            <input id="image" type="file" class="add" name="photo[]" accept="image/jpeg" required onchange="form.submit()" multiple>
            <br><span style="font-size: 12px">Max 20 Plików z rozszerzeniem .jpg. Max rozmiar 4MB</span>
      </form>      
      <div class="wrapper">   
<?php

   foreach($photo->getAllPhotos() as $photograph) {

      echo'
         <a style="display: contents; position: relative;" href="photos/' . $photograph['id'] . '.jpg" data-lightbox="gallery" data-title="dodano ' . $photograph['date'] . '">
            <img src="photos/' . $photograph['id'] . '.jpg" loading="lazy" alt="Zdjęcie z galerii">
         </a>';

   }

?>  
      </div>
