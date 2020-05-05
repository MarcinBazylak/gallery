   <h1>Galeria zdjęć</h1>

      <a href="index.php?page=delete"><button class="add">Usuń zdjęcie</button></a>
      <form id="form" enctype="multipart/form-data" action="upload.php" method="POST">
         <input type="hidden" name="add" value="1">
         <input id="image" type="file" class="add" name="photo[]" accept="image/jpeg" required multiple> 
         <br><span style="font-size: 12px">Max 20 Plików z rozszerzeniem .jpg. Max rozmiar 4MB</span><br>
      </form>
      <div class="progress">
         <div class="bar"></div>
         <div class="percent">0%</div >
      </div>
      <div id="status"></div>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
      <script src="js/upload.js"></script>
      <script src="js/statusBar.js"></script>
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
