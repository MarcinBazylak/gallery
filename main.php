<h1>Galeria zdjęć</h1>

<a href="index.php?page=add"><button class="add">Dodaj zdjęcie</button></a>
<a href="index.php?page=delete"><button class="add">Usuń zdjęcie</button></a>

<div class="wrapper">
   
<?php

   foreach($photo->getAllPhotos() as $photograph) {

      echo'<a style="display: contents; position: relative;" href="photos/' . $photograph['id'] . '.jpg" data-lightbox="gallery" data-title="' . $photograph['title'] . '<br>' . $photograph['description'] . '"><img src="photos/' . $photograph['id'] . '.jpg" loading="lazy" alt="' . $photograph['title'] . '"></a>';

   }


?>
  
</div>